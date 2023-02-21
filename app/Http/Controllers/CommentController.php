<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class CommentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request, User $user, Post $post){

        $this->validate($request, [
            'comment' => ['required', 'min:1', 'max:255']
        ]);

        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comment' => $request->comment
        ]);

        return back()->with('message', 'Comment posted');
    }
}
