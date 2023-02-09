<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

        $request->request->add(['username' => Str::slug($request->username)]);
        
        $this->validate($request, [
            'name'=> ['required', 'min:3', 'max:25'],
            'username' => ['required','min:3', 'max:25','unique:users'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','confirmed', 'min:8']
        ]);

        $unhashedPassword = $request->password;
        $request->request->add(['password' => Hash::make($request->password) ]);

        User::create( $request->all());

        $credentials = [
            'email' => $request->email,
            'password' => $unhashedPassword
        ];


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('reel.index'));
        }

        return redirect()->route('signin');
    }
}
