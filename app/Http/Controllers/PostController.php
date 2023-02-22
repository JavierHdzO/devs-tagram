<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user){
        
        $posts = $user->posts()->simplePaginate(20);
        return view('layouts.dashboard', ['user' => $user, 'posts' => $posts]);
    }

    
    public function create(){
        return view('posts.create');
    }


    public function store(Request $request){
        
        $this->validate($request, [
            "title" => [ 'required', 'max:150'],
            "description" => [ 'required' ],
            "image" => [ 'required' ]
        ]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);

        // $request->user()->posts()->create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'user_id' => auth()->user()->id 
        // ]);
        
        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user,  Post $post){


        return view('posts.show', [
            'post' => $post,
            'user' => $user,
            'comments' => $post->comments
        ]);
    }

    public function destroy(Post $post){

        if(!$this->authorize('delete',$post))
            return back()->withErrors([
                'error'=>'No permission required'
            ]);
        
        $post->delete();
        
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
