<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login'); 
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required']
        ]);

        if(!Auth::attempt($credentials, $request->remember)){
            return back()->withErrors([
                'credentials' => "The provided credential do not math with records"
            ])->onlyInput('credentials');
        }
        
        $request->session()->regenerate();
        return redirect()->intended( route('posts.index', auth()->user()->username) );
    }

}
