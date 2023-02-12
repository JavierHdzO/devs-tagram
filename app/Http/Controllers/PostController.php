<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    //

    public function index(User $user){
    
        return view('layouts.dashboard', ['user' => $user]);
    }

    public function create(){
        return view('posts.create');
    }
}
