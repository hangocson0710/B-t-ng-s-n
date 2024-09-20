<?php

namespace App\Http\Controllers\Home\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Auth\ChangePasswordRequest;
use App\Http\Requests\Home\UpdateInfoRequest;
use App\Http\Requests\Home\UpgrateBusinessRequest;
use App\Models\Classified;
use App\Models\ClassifiedCare;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ClassifiedParam;
use App\Models\Group;
use App\Models\Ward;
use App\Models\District;
use App\Models\Project;
use App\Models\Unit;

use App\Models\UserTransaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    public function info()
    {
        $param['user'] = User::leftJoin('province', 'user.province_id', '=', 'province.id')
            ->leftJoin('district', 'user.district_id', '=', 'district.id')
            ->leftJoin('ward', 'user.ward_id', '=', 'ward.id')
            ->select("user.*", 'province.province_name', 'district.district_name', 'ward.ward_name')
            ->find(Auth::user()->id);
        $param['province'] = Province::all();
        return view('Home.Account.Info', compact('param'));
    }

    public function post_update(UpdateInfoRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->province_id = $request->province_id;
        $user->district_id = $request->district_id;
        $user->ward_id = $request->ward_id;
        if ($request->hasFile('avatar')) {
            $name = Str::random(10) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('Uploads/Avatar/'), $name);
            $user->avatar = 'Uploads/Avatar/' . $name;
        }
        $user->save();
        Toastr::success('Cập nhật thành công');
        return back();
    }

    # danh sách bài viết
    public function list_classified()
    {
        $param['classified'] = Classified::where('user_id', Auth::user()->id)
            ->select('classified.*')
            ->paginate(4);
        return view('Home.Account.ListClassified', compact('param'));
    }

    #danh sách khách hàng
    public function list_customer()
    {
        // $param['user'] = ClassifiedCare::join('classified', 'classified_care.classified_id', '=', 'classified.id')
        //     ->where('classified.user_id', '=', Auth::user()->id)
        //     ->paginate(5);
        // return view('Home.Account.ListCustomer', compact('param'));
        $param['user'] = ClassifiedCare::whereHas('classified', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->with('user', 'classified')->paginate(5);

        return view('Home.Account.ListCustomer', compact('param'));
        
    }

    public function upgrate_account()
    {
        if (Auth::user()->user_type == 2) {
            Toastr::error('Tài khoản đã là tài khoản doanh nghiệp');
            return back();
        }
        if(Auth::user()->coin_amount < 200){
            Toastr::error('Số dư không đủ');
            return view('Home.PageError.ErrorCoin');
        }
        return view('Home.Auth.UpgrateBusiness');
    }

    public function confirm_upgrate(UpgrateBusinessRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->is_active = 0;
        $user->coin_amount -=200;
        $user->updated_at = time();
        $user->business_name = $request->business_name;
        if ($request->hasFile('license')) {
            $name = time() . '.' . $request->file('license')->getClientOriginalExtension();
            $request->file('license')->move(public_path('Uploads/License/'), $name);
            $user->license = 'Uploads/License/' . $name;
        }
        $transaction = new UserTransaction();
            $transaction->user_id =Auth::user()->id;
            $transaction->transaction_type =4;
            $transaction->transaction_code =Str::upper(Str::random(8));
            $transaction->transaction_amount =200;
            $transaction->transaction_time =time();
            $transaction->transaction_status =1;
            $transaction->transaction_confirm =1;
            $transaction->save();
        $user->save();
        Toastr::success('Nâng cấp thành công, vui lòng đợi ban quản trị duyệt');
        return redirect(route('trang-chu'));
    }

    #get - đổi mật khẩu
    public function get_change_password()
    {
        return view('Home.Account.ChangePassword');
    }

    #post - đổi mật khẩu
    public function post_change_password(ChangePasswordRequest $request)
    {
        if (!Hash::check($request->password_old, Auth::user()->password)) {
            return back()->with('password-fail', 'Mật khẩu cũ không đúng');
        }
        $user = User::find(Auth::user()->id);
        if ($user == null) {
            Toastr::error('Đã xảy ra lỗi');
            return back();
        }
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('Đổi mật khẩu thành công');
        return back();
    }
    
    public function edit($id)
    {
        $param['province'] = Province::get();
        $param['project'] = Project::where('is_show', 1)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->get();
        $param['group'] = Group::where('group_type', 1)->get();
        $param['area'] = Unit::where('unit_type', 2)->get();
        $param['price'] = Unit::where('unit_type', 1)->get();
        $param['num_bed'] = ClassifiedParam::where('param_type', 'P')->get();
        $param['num_toi'] = ClassifiedParam::where('param_type', 'T')->get();
        $param['classified'] = Classified::find($id);
        $param['district'] = $param['classified'] ? District::where('province_id', $param['classified']->province_id)->get() : [];
        $param['ward'] = $param['classified'] ? Ward::where('district_id', $param['classified']->district_id)->get() : [];

        return view('Home.Account.EditClassified', compact('param'));
    }

    public function post_edit1(Request $request, $id)
    {
        $item = Classified::find($id);

        $item->group_id = $request->group_id;
        $item->project_id = $request->project_id;
        $item->classified_title = $request->classified_title;
        $item->classified_url = Str::slug($request->classified_title) . Str::random(4);
        $item->classified_content = $request->classified_content;
        $item->classified_price = $request->classified_price;
        $item->price_type = $request->price_type;
        $item->classified_area = $request->classified_area;
        $item->area_type = $request->area_type;
        $item->num_bed = $request->num_bed;
        $item->num_toi = $request->num_toi;
        $item->classified_address = $request->classified_address;
        $item->province_id = $request->province_id;
        $item->district_id = $request->district_id;
        $item->ward_id = $request->ward_id;
        $item->updated_at = time();
        $is_vip_before = $item->is_vip && $item->vip_time >= time();  // Kiểm tra nếu trước đó là VIP và vẫn còn hạn
        if ($request->has('is_vip')) {
            if (!$is_vip_before) { // Nếu bài đăng đã hết VIP
                $config = DB::table('package_price')->first();
                $price = $config->price_vip;
    
                // Kiểm tra số dư
                if (Auth::user()->coin_amount < $price) {
                    Toastr::error("Số dư không đủ để phục hồi VIP");
                    return back();
                }
    
                // Trừ số dư và cập nhật lại thời gian VIP
                Auth::user()->coin_amount -= $price;
                $item->is_vip = 1;
                $item->vip_time = time() + $config->time_vip;
                Auth::user()->save();
    
                // Lưu lịch sử giao dịch
                $transaction = new UserTransaction();
                $transaction->transaction_type = 2;
                $transaction->transaction_code = Str::upper(Str::random(8));
                $transaction->transaction_amount = $price;
                $transaction->transaction_status = 1;
                $transaction->transaction_time = time();
                $transaction->transaction_confirm = 1;
                $transaction->save();
            }
        } else {
            $item->is_vip = 0;
        }

        

        if ($request->hasFile('classified_image')) {
            $arrImage = [];
            foreach ($request->file('classified_image') as $i) {
                $name = Str::random(4) . time() . '.' . $i->getClientOriginalExtension();
                $i->move(public_path('Uploads/Classified/'), $name);
                array_push($arrImage, 'Uploads/Classified/' . $name);
            }
            $item->classified_image = $arrImage;
        }

        $item->save();

        Toastr::success("Cập nhật thành công");
        return redirect(route('tin-rao-da-dang'));
    }
    public function delete($id)
    {
        $classified = Classified::find($id);
        if ($classified == null) {
            Toastr::error("Không tồn tại");
            return back();
        }
        $classified->is_deleted = 1;
        $classified->save();
        Toastr::success("Xóa thành công");
        return back();
    }

    public function restore($id)
    {
        $classified = Classified::find($id);
        if ($classified == null) {
            Toastr::error("Không tồn tại");
            return back();
        }
        $classified->is_deleted = 0;
        $classified->save();
        Toastr::success("Khôi phục thành công");
        return back();
    }
}
