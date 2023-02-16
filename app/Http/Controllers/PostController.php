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
        $this->middleware('auth');
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

    public function show(){
        return view('posts.show');
    }
}
