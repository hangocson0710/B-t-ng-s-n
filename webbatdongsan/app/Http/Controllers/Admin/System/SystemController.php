<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\System\UpdateBankRequest;
use App\Http\Requests\Admin\System\UpdateHomeRequest;
use App\Http\Requests\Admin\System\UpdateInfoRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    public function get_system(){
        $param['home'] = DB::table('home_config')->first();
        $param['about'] = DB::table('about')->first();
        return view('Admin.System.System',compact('param'));
    }
    public function post_home(UpdateHomeRequest $request){
        $data = [
            'num_classified'=>$request->num_classified,
            'num_project'=>$request->num_project,
            'num_news'=>$request->num_news,
        ];
        $home = DB::table('home_config')->first();
        $config = DB::table('home_config')->where('id',$home->id)->update($data);
        Toastr::success("Cập nhật thành công");
        return back();
    }
    public function post_bank(UpdateBankRequest $request){
        $data = [
            'bank_name'=>$request->bank_name,
            'bank_number'=>$request->bank_number,
            'bank_author'=>$request->bank_author,
        ];
        $home = DB::table('about')->first();
        $config = DB::table('about')->where('id',$home->id)->update($data);
        Toastr::success("Cập nhật thành công");
        return back();
    }
    public function post_about(UpdateInfoRequest $request){
        $data = [
            'about_address'=>$request->about_address,
            'about_phone'=>$request->about_phone,
            'about_email'=>$request->about_email,
            'about_facebook'=>$request->about_facebook,
            'about_youtube'=>$request->about_youtube,
            'about_info'=>$request->about_info,
        ];
        if($request->hasFile('about_logo')){
            $name = time().'-'.$request->file('about_logo')->getClientOriginalExtension();
            $request->file('about_logo')->move(public_path('Uploads/Logo/'),$name);
            $data['about_logo'] = 'Uploads/Logo/'.$name;
        }
        $home = DB::table('about')->first();
        $config = DB::table('about')->where('id',$home->id)->update($data);
        Toastr::success('Cập nhật thành công');
        return back();
    }
}
