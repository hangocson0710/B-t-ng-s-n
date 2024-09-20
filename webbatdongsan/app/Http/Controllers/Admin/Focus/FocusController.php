<?php

namespace App\Http\Controllers\Admin\Focus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FocusRequest;
use App\Http\Requests\UpdateFocusRequest;
use App\Models\Focus;
use App\Models\Group;
use App\Models\News;
use App\Models\Project;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//tin tức
class FocusController extends Controller
{
    public function list(){
        $list = News::all();
        return view('Admin.FocusNew.Focus',compact('list'));
   }

   public function get_edit($id){
    $param['focus'] = News::find($id);
    if($param['focus']==null){
        Toastr::error("Không tồn tại dự án");
        return back();
    }
       $param['group']= Group::where('group_type','=',3)->where('is_deleted','=',0)->get();

    return view('Admin.FocusNew.EditFocus',compact('param'));
}
    public function post_edit(UpdateFocusRequest $request,$id){
   $item = News::find($id);
   $item->group_id = $request->group_id;
   $item->news_title = $request->news_title;
   $item->news_content = $request->news_content;
   $item->news_url = Str::slug($request->news_title).Str::random(5);
   $item->updated_at = time();
        if($request->hasFile('news_image')){
            $name = time().'-'.Str::random(8).'.'.$request->file('news_image')->getClientOriginalExtension();
            $image = $request->file('news_image')->move(public_path('Uploads/News/'),$name);
            $item->news_image = 'Uploads/News/'.$name;
        }
   $item->save();
   Toastr::success("Cập nhật thành công");
   return redirect(route('admin.focus.list'));
}
      public function add(){
      $param['group']= Group::where('group_type','=',3)->where('is_deleted','=',0)->get();
      return view('Admin.FocusNew.AddFocus',compact('param'));
      }
  public function post(FocusRequest $request){
  $data=[
    'news_url' =>Str::slug($request->news_title).Str::random(5),
    'news_title' => $request->news_title,
    'group_id' => $request->group_id,
    'news_content' => $request->news_content,
    'created_at' => strtotime(Carbon::now()),
    'created_by' => Auth::guard('admin')->user()->id
  ];
    if($request->hasFile('news_image')){
        $name = time().'-'.Str::random(8).'.'.$request->file('news_image')->getClientOriginalExtension();
        $image = $request->file('news_image')->move(public_path('Uploads/News/'),$name);
        $data['news_image'] = 'Uploads/News/'.$name;
    }
  $news = DB::table('news')->insert($data);
    Toastr::success('Thêm tin thành công');
      return redirect(route('admin.focus.list'));
  }


   public function block_display($id){
    $item = Focus::find($id);
    if($item == null){
        Toastr::error("Không tồn tại tiêu điểm");
        return back();
    }
    $item->is_show = 0;
    $item->save();
    Toastr::success("Chặn hiển thị thành công");
    return back();
}
public function unblock_display($id){
    $item = Focus::find($id);
    if($item == null){
        Toastr::error("Không tồn tại tiêu điểm");
        return back();
    }
    $item->is_show = 1;
    $item->save();
    Toastr::success("Khôi phục hiển thị thành công");
    return back();
}
public function delete_item($id){
    $item = Focus::find($id);
    if($item == null){
        Toastr::error("Không tồn tại dự án");
        return back();
    }
    $item->is_deleted = 1;
    $item->save();
    Toastr::success("Xóa thành công");
    return back();
}
public function restore_item($id){
    $item = Focus::find($id);
    if($item == null){
        Toastr::error("Không tồn tại dự án");
        return back();
    }
    $item->is_deleted =0;
    $item->save();
    Toastr::success("Khôi phục thành công");
    return back();
}

}
