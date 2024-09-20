<?php

namespace App\Http\Controllers\Admin\Forbidden;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForbiddenController extends Controller
{
    # danh sách chặn cấm
    public function list(){
        $param['list'] = User::where('is_deleted',1)
            ->orWhere('is_forbidden',1)
            ->orWhere('block_time','>',time())->get();
        return view('Admin.Forbidden.List',compact('param'));
    }
    # mỏ chặn
    public function unblock($id){
        $user = User::find($id);
        if($user == null){
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        $user->is_block = 0;
        $user->block_time = null;
//        $user->num_block +=1;
//        if($user->num_block >= 3){
//            $user->is_forbidden =1;
//
//        }
        $user->save();
        Toastr::success('Mở chặn thành công');
        return back();
    }
    public function unforbidden($id){
        $user = User::find($id);
        if($user == null){
            Toastr::error('Không tồn tại tài khoản');
            return back();
        }
        $user->is_forbidden =0;
        if($user->num_block >=3){
            $user->num_block = 0;
        }
        $user->save();
        Toastr::success('Mở cấm thành công');
        return back();
    }
    public function undelete($id){
    $user = User::find($id);
    if($user == null){
        Toastr::error('Không tồn tại tài khoản');
        return back();
    }
    $user->is_deleted =0;
    $user->save();
    Toastr::success('Khôi phục thành công');
    return back();
}
}
