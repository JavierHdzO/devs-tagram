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
    
        return view('layouts.dashboard', ['user' => $user]);
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
        
        return dd('prueba');
    }
}
