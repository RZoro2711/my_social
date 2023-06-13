<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    function add(Request $request)
    {
        $comment = new Comment();
        $comment->content_id = request()->content_id;
        $comment->user_id = request()->user_id;
        $comment->comment = request()->comment;
        $comment->save();
        return redirect(url('/content/detail/' . $comment->content_id));
    }
    function delete($id){
        $comment = Comment::find($id);
        if(Gate::allows('comment-delete', $comment)){
            $comment->delete();
            return back();
        }
        return back();
    }
}
