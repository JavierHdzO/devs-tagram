<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //Valiation

        $this->validate($request, [
            'name'=> ['required', 'min:3', 'max:25'],
            'username' => ['required','min:3', 'max:25','unique:users'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','confirmed', 'min:8']
        ]);
    }
}
