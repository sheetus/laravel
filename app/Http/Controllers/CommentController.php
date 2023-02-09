<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId){
        $userComments=Comment::all();
        
        $this->validate($request, [
            
             'user_id' =>'required|max:20',
             'body'=>'required|max:30'
        ]);
        $comment=Post::find($postId);
        // dd($comment);
        $comment= new Comment();
       
        $comment->user_id=$request->name;
        $comment->body=$request->body;
        $comment->post()->associate($postId);
        $comment->save();
    
        return redirect()->route('posts.show',$postId);
    }
}