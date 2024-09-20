<?php

namespace App\Http\Controllers\Home\Classified;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\CreatedClassifiedRequest;
use App\Models\Classified;
use App\Models\ClassifiedCare;
use App\Models\ClassifiedComment;
use App\Models\ClassifiedParam;
use App\Models\District;
use App\Models\Group;
use App\Models\Project;
use App\Models\Province;
use App\Models\Ward;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserTransaction;
use App\Models\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ClassifiedController extends Controller
{
    public function dang_tin_rao()
    {
        $item['group'] = Group::where('group_type', '=', 1)->where('is_deleted', '=', 0)->get();
        $item['project'] = Project::where(['is_show' => 1, 'is_active' => 1, 'is_deleted' => 0])->get();
        $item['province'] = Province::all();
        $item['district'] = District::all();
        $item['ward'] = Ward::all();
        $item['price'] = Unit::where('unit_type', 1)->get();
        $item['area'] = Unit::where('unit_type', 2)->get();
        $item['num_bed'] = ClassifiedParam::where('param_type', 'P')->get();
        $item['num_toi'] = ClassifiedParam::where('param_type', 'T')->get();
        return view('Home.Classified.add-classified', compact('item'));
    }

    public function post_dang_tin(CreatedClassifiedRequest $request)
    {
        $config = DB::table('package_price')->first();
        $classified = new Classified();
        $classified->group_id = $request->group_id;

        // Kiểm tra project_id có tồn tại hay không trước khi thêm
        if ($request->project_id != null) {
            $project = Project::find($request->project_id);
            if (!$project) {
                Toastr::error("Project không tồn tại");
                return back();
            }
            $classified->project_id = $request->project_id;
        }
        $classified->user_id = Auth::user()->id;
        $classified->classified_title = $request->classified_title;
        $classified->classified_url = Str::slug($request->classified_title) . '-' . Str::random(4);
        $classified->classified_content = $request->classified_content;
        $classified->classified_price = $request->classified_price;
        $classified->price_type = $request->price_type;
        $classified->classified_area = $request->classified_area;
        $classified->area_type = $request->area_type;
        $classified->num_bed = $request->num_bed;
        $classified->num_toi = $request->num_toi;
        $classified->classified_address = $request->classified_address;
        $classified->province_id = $request->province_id;
        $classified->district_id = $request->district_id;
        $classified->ward_id = $request->ward_id;
        $classified->created_at = time();
        $classified->created_by = Auth::user()->id;
        $price = $config->price;
        if($request->has('is_vip')){
            $classified->is_vip = 1;
            $classified->vip_time = time()+$config->time_vip;
            $price = $config->price_vip;
        }

        # xử lý ảnh
        if ($request->hasFile('classified_image')) {
            $arrImage = [];
            foreach ($request->file('classified_image') as $i) {
                $name = Str::random(4) . time() . '.' . $i->getClientOriginalExtension();
                $i->move(public_path('Uploads/Classified/'), $name);
                array_push($arrImage, 'Uploads/Classified/' . $name);
            }
            $classified->classified_image = json_encode($arrImage);
        }
        if(Auth::user()->coin_amount < $price){
            Toastr::error("Số dư không đủ");
            return back();
        }
        $classified->save();

                # Trừ tiền user
        $user = User::find(Auth::user()->id);
        $user->coin_amount -= $price;
        $user->save();

        #hóa đơn
       $transaction = new UserTransaction();
       $transaction->transaction_type = 2;
       $transaction->transaction_code = Str::upper(Str::random(8));
       $transaction->transaction_amount = $price;
       $transaction->transaction_status = 1;
       $transaction->transaction_time =time();
       $transaction->transaction_confirm = 1;
       $transaction->save();

        Toastr::success("Đăng tin thành công");
        return redirect(route('trang-chu'));
    }

    public function sign_up_classified($classified_id)
    {
        $check = ClassifiedCare::where('classified_id', $classified_id)->where('user_id', Auth::user()->id)->first();
        if ($check != null) {
            Toastr::error('Đã đăng kí tin đăng này');
            return back();
        }
        $item = new ClassifiedCare();
        $item->classified_id = $classified_id;
        $item->user_id = Auth::user()->id;
        $item->created_at = time();
        $item->save();
        Toastr::success('Yêu cầu thành công');
        return back();
    }

    public function delete_comment($comment_id)
    {
        $comment = ClassifiedComment::find($comment_id);
        if ($comment == null) {
            Toastr::error("Không tồn tại bình luận");
            return back();
        }
        $comment->delete();
        Toastr::success("Xóa bình luận thành công");
        return back();
    }

    public function danhSachYeuThich()
    {
        $param['classified'] = DB::table('classified_care')
            ->join('classified', 'classified.id', '=', 'classified_care.classified_id')
            ->select('classified.*')
            ->where('classified_care.user_id', Auth::id())
            ->get();

        return view('Home.Classified.favorites', compact('param'));
    }

    public function themYeuThich($classified_id)
    {
        $user_id = Auth::user()->id;
        $exists = ClassifiedCare::where('user_id', $user_id)
            ->where('classified_id', $classified_id)
            ->exists();

        if ($exists) {
            Toastr::error('Bài viết đã tồn tại trong danh sách yêu thích.');
        } else {
            $classifiedCare = new ClassifiedCare();
            $classifiedCare->user_id = $user_id;
            $classifiedCare->classified_id = $classified_id;
            $classifiedCare->created_at = time();
            $classifiedCare->save();
            Toastr::success('Đã thêm vào danh sách yêu thích.');
        }

        return back();
    }
    public function xoaYeuThich($classified_id){
        $user_id = Auth::user()->id;
        $classifiedCare = ClassifiedCare::where('user_id', $user_id)
            ->where('classified_id', $classified_id)
            ->first();

        if ($classifiedCare) {
            $classifiedCare->delete();
            Toastr::success('Đã xóa khỏi danh sách yêu thích.');
        } else {
            Toastr::error('Bài viết không tồn tại trong danh sách yêu thích.');
        }

        return back();
    }
    public function guiLienHe(Request $request)
{
    $contact = new Contact();
    $contact->name = $request->input('name');
    $contact->email = $request->input('email');
    $contact->phone = $request->input('phone');
    $contact->message = $request->input('message');
    $contact->classified_id = $request->input('classified_id');
    $contact->save();

    Toastr::success('Thông tin liên hệ của bạn đã được gửi thành công.');
    return back();
}





 
}

