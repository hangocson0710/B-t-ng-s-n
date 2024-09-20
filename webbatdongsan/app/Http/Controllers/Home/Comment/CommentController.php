<?php

namespace App\Http\Controllers\Home\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Comment\AddCommentRequest;
use App\Models\ClassifiedComment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function post_comment(AddCommentRequest $request,$classified_id){
        $comment = new ClassifiedComment();
        $comment->user_id = Auth::user()->id;
        $comment->classified_id = $classified_id;
        $comment->comment_content = $request->comment_content;
        $comment->created_at =time();
        $comment->save();
        Toastr::success('Bình luận thành công');
        return back();

    }
}