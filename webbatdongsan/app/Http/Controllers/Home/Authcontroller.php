<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Auth\LoginRequest;
use App\Http\Requests\Home\Auth\RegisterRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Authcontroller extends Controller
{
    public function register(){
        return view('Home.Auth.Register');
    }

    public function post_register(RegisterRequest $request){
        $user = new User();
        $user->username = $request->username;
        $user->user_type = 1;
        $user->coin_amount=0;
        $user->created_at = time();
        $user->password = Hash::make($request->password);
        $user->fullname = $request->fullname;  
        $user->email = $request->email;  
        $user->save();

        Toastr::success("Đăng kí thành công!");
        return redirect(route('dang-nhap'));
    }

    public function login(){
        return view('Home.Auth.Login');
    }

    // public function post_login(LoginRequest $request){
    //     if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
    //         if (Auth::user()->is_deleted == 1) {
    //             Auth::logout();
    //             Toastr::error('Tài khoản đã bị xóa');
    //             return back();
    //         }
            

    //         Toastr::success("Đăng nhập thành công");
    //         return redirect(route('trang-chu'));
    //     } else {
    //         Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
    //         return back();
    //     }
    // }
    public function post_login(LoginRequest $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            
            // Kiểm tra trạng thái tài khoản
            if ($user->is_deleted == 1) {
                Auth::logout();
                Toastr::error('Tài khoản đã bị xóa');
                return back();
            }

            if ($user->is_block == 1 && $user->block_time > time()) {
                Auth::logout();
                Toastr::error('Tài khoản của bạn đã bị chặn.');
                return back();
            }

            Toastr::success("Đăng nhập thành công");
            return redirect(route('trang-chu'));
        } else {
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
            return back();
        }
    }

    public function logout(){
        if (Auth::check()) {
            Auth::logout();
            return redirect(route('dang-nhap'));
        } else {
            Toastr::error('Chưa đăng nhập!');
            return back();
        }
    }
}
