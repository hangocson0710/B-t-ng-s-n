<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function get_login(){
        return view('Admin.Auth.Login');
    }
    public function post_login(Request $request){
        $validate = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'Vui lòng nhập tài khoản',
            'password.required'=>'Vui lòng nhập mật khẩu'
        ]);
        if(Auth::guard('admin')->attempt(['admin_username'=>$request->username,'password'=>$request->password])){
            if(Auth::guard('admin')->user()->is_active == 0){
                Toastr::error('Tài khoản bị khóa');
                Auth::guard('admin')->logout();
                return back();
            }
            return redirect()->route('admin.analytics.list');
        }
        else{
            Toastr::error('Đăng nhập không thành công');
            return  back();
        }
    }
    public  function logout(){
        Auth::guard('admin')->logout();
        Toastr::success("Đăng xuất thành công");
        return redirect(route('admin.login'));
    }
}
