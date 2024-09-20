<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\UserTransaction;



class UserController extends Controller
{
    public function list_request()
    {
        $param['list'] = User::where('is_active', '<>', null)->orderBy('updated_at', 'desc')->get();
        return view('Admin.User.Request', compact('param'));
    }

    public function browse_business($id)
    {
        $user = User::find($id);
        $user->user_type =2;
        $user->is_active = 1;
        $user->save();
        Toastr::success('Duyệt thành công');
        return back();
    }

    public function no_browse_business($id)
    {
        $user = User::find($id);
        $user->is_active = 2;
        $user->coin_amount += 200;
        $user->save();
        $transaction = new UserTransaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_type = 4;
        $transaction->transaction_code = Str::upper(Str::random(8));
        $transaction->transaction_amount = 200;
        $transaction->transaction_time = time();
        $transaction->transaction_status = 2;
        $transaction->transaction_confirm = 1;
        $transaction->confirm_by = Auth::guard('admin')->user()->id;
        $transaction->save();
        Toastr::success('Từ chối duyệt thành công');
        return back();
    }

    public function list_user()
    {
        $param['list'] = User::where('user_type', 1)->get();
        return view('Admin.User.ListUser', compact('param'));
    }

    public function list_business()
    {
        $param['list'] = User::where('user_type', 2)->where('is_active', 1)->get();
        return view('Admin.User.ListBusiness', compact('param'));
    }

    public function block($id)
    {
        $user = User::find($id);
        if ($user == null) {
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        $user->is_block = 1;
        $user->block_time = strtotime(Carbon::now()->addDays(7));
        $user->num_block += 1;
        if ($user->num_block >= 3) {
            $user->is_forbidden = 1;
        }
        $user->save();
        Toastr::success('Chặn thành công');
        return back();
    }

    public function forbidden($id)
    {
        $user = User::find($id);
        if ($user == null) {
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        $user->is_forbidden = 1;
        $user->save();
        Toastr::success('Cấm thành công');
        return back();
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user == null) {
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        $user->is_deleted = 1;
        $user->save();
        Toastr::success('Xóa thành công');
        return back();
    }
}
