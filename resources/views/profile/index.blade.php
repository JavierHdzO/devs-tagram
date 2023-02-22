@extends('layouts.app')

@section('title')
    Edit Profile: {{ auth()->user()->username }}
@endsection

@section('container')

<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-gray-700 shadow p-6">
        <form action="{{ route('profile.store') }}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label id="username" class="mb-2 block uppercase text-gray-500 font-bold" >
                    Username
                </label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    placeholder="Username"
                    class="border p-3 w-full rounded-md bg-gray-500 text-white
                        @error('username')
                        border-red-500
                        @enderror
                    "
                    value="{{ auth()->user()->username }}"
                    >
                    @error('username')
                        <p class="bg-red-400 rounded-lg text-sm text-white font-bold p-1 text-center">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-5">
                <label id="image" class="mb-2 block uppercase text-gray-500 font-bold" >
                    Profile image
                </label>
                <input 
                    type="file" 
                    name="image" 
                    id="image" 
                    placeholder="Profile image"
                    class="border p-3 w-full rounded-md bg-gray-500 text-white"
                    accept=".jpg, .jepg, .png"
                    >
            </div>
            <div class="w-full flex justify-end gap-2">

                <a 
                    href="{{ route('posts.index', auth()->user()->username) }}"
                    class="border-2 border-red-600 hover:shadow hover:bg-red-600 cursor-pointer w-1/4 h-10 text-white text-center flex items-center justify-center rounded-md">Cancel</a>
                <input 
                    type="submit" 
                    value="Submit" 
                    class="border-2 border-green-600 hover:shadow hover:bg-green-600 cursor-pointer w-1/4 h-10 text-white rounded-md">
                    
            </div>
        </form>
    </div>
</div>
@endsection