<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Reaction;

class ReactionController extends Controller
{
    //
    public function store(Request $request, Post $post){
        $post->reactions()->create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);

        return back();
    }

    public function destroy(Request $request, Post $post){

        $request->user()->reactions()->where('post_id', $post->id)->delete();
        return back();

    }

    
}
