<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\AddBannerRequest;
use App\Http\Requests\Admin\Banner\UpdateBannerRequest;
use App\Models\Banner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function list(){
        $param['list'] = Banner::all();
        return view('Admin.Banner.List',compact('param'));
    }
    public function add(){
        return view('Admin.Banner.Add');
    }
    public function post_add(AddBannerRequest $request){
        $banner = new Banner();
        $banner->banner_link = $request->banner_link;
        $banner->created_at = time();
        $banner->created_by = Auth::guard('admin')->user()->id;
        if($request->hasFile('banner_image')){
            $name = time().'-'.Str::random(8).'.'.$request->file('banner_image')->getClientOriginalExtension();
            $image = $request->file('banner_image')->move(public_path('Uploads/Banner/'),$name);
           $banner->banner_image= 'Uploads/Banner/'.$name;
        }
        $banner->save();
        Toastr::success('Thêm thành công');
        return redirect(route('admin.banner.list'));
    }
    public function block($id){
        $banner = Banner::find($id);
        if($banner==null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $banner->is_show = 0;
        $banner->save();
        Toastr::success('Chặn hiển thị thành công');
        return back();
    }
    public function unblock($id){
        $banner = Banner::find($id);
        if($banner==null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $banner->is_show = 1;
        $banner->save();
        Toastr::success('Hiển thị thành công');
        return back();
    }

    public function delete($id){
        $banner = Banner::find($id);
        if($banner==null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $banner->delete();
        Toastr::success('xóa thành công');
        return back();
    }
    public function edit($id){
        $banner = Banner::find($id);
        if($banner==null){
            Toastr::error('Không tồn tại');
            return back();
        }
        return view('Admin.Banner.Edit',compact('banner'));
    }
    public function post_edit(UpdateBannerRequest $request,$id){
        $banner = Banner::find($id);
        if($banner==null){
            Toastr::error('Không tồn tại');
            return back();
        }
        $banner->banner_link = $request->banner_link;
        if($request->hasFile('banner_image')){
            $name = time().'-'.Str::random(8).'.'.$request->file('banner_image')->getClientOriginalExtension();
            $image = $request->file('banner_image')->move(public_path('Uploads/Banner/'),$name);
            $banner->banner_image= 'Uploads/Banner/'.$name;
        }
        $banner->save();
        Toastr::success('Cập nhật thành công');
        return redirect(route('admin.banner.list'));
    }
}
