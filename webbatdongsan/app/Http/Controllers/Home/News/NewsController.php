<?php

namespace App\Http\Controllers\Home\News;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\News;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   public function list_group($group_url,Request $request){
        $param['group'] = Group::where('group_url',$group_url)->first();
        $param['list_group'] = Group::whereHas('group_news')->get();
        $param['news'] = News::where('group_id',$param['group']->id)->where(['is_show'=>1,'is_deleted'=>0]);
        $param['news_view'] = News::orderBy('num_view','desc')->where(['is_show'=>1,'is_deleted'=>0])
            ->take(5)->get();
        $request->search!=''? $param['news']->where('news_title','LIKE','%'.$request->search.'%'):null;
            $param['news'] = $param['news'] ->paginate(5);
       return view('Home.News.NewsGroup',compact('param'));
   }
   public function news_detail($news_url){
        $news = News::where('news_url',$news_url)->where(['is_show'=>1,'is_deleted'=>0])->first();
        if($news == null){
            Toastr::error('Không tồn tại bài viết');
            return back();
        }
       $param['news'] = News::where('group_id',$news->group_id)->where(['is_show'=>1,'is_deleted'=>0])->where('news_url','<>',$news_url)->take(2)->get();
       $news->num_view += 1;
        $news->save();
       return view('Home.News.Detail',compact('news','param'));
   }
}
