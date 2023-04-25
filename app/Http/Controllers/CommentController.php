<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Comment;


class CommentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        $comment = new Comment;
        $comment->content=request()->content;
        $comment->article_id=request()->article_id;

        $comment->user_id = auth()->user()->id;



        $comment->save();

        return back()->with("commentAdd","Comment Added");
    }

    public function delete($id){
        $comment = Comment::find($id);


        $comment->delete();
        return back()->with("commentDelete","Comment deleted");


    }

    public function commentEdit($id){

        $comments = Comment::find($id);
       if(request()->isMethod('post')){

            $comments->content = request()->content;
            $comments->save();
        return redirect("/articles/detail/{$comments->article_id}");


        return redirect("/articles/detail/{$comments->article_id}")->with("notwork","unauthorized");
       }
       return view("comments.edit",[
        "comment"=>$comments,

    ]);
    }
}
