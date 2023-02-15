<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    //
    public function store(Request $request){
        
        $file = $request->file('file');
        
        $fileName = Str::uuid() . "." . $file->extension();
        $fileServer = Image::make($file);
        $fileServer->fit(1000,1000);

        $filePath = public_path('uploads') . '/' . $fileName;

        $fileServer->save($filePath);
        

        return response()->json([
            "image"=>$fileName
        ]);
    }
}
