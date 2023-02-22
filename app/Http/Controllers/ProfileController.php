<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(User $user){

            return view('profile.index');
        
    }

    public function store(Request $request){

        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => [ 'required', 'min:3', 'max:25','unique:users,username,'.auth()->user()->id ]
        ]);

        if($request->image){
            $file = $request->file('image');
        
            $fileName = Str::uuid() . "." . $file->extension();
            $fileServer = Image::make($file);
            $fileServer->fit(1000,1000);

            $filePath = public_path('profiles') . '/' . $fileName;

            $fileServer->save($filePath);
        }

        $user = User::find(auth()->user()->id);

        if($user->image){
            $oldImagePath = public_path('profiles' . '/' . $user->image);
            if(File::exists($oldImagePath)){
                unlink($oldImagePath);
            }
        }

        $user->username = $request->username;
        $user->image = $fileName ?? auth()->user()->image ??  '';

        $user->save();

        return redirect()->route('posts.index', $user->username);

    }
}
