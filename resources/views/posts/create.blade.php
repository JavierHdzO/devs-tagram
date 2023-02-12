@extends('layouts.app')

@section('title')
    Create new post
@endsection

@section('container')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            image here
        </div>
        <div class="md:w-1/2 px-10 mt-10 bg-gray-300 p-6 rounded-lg shadow-lg shadow-white md:mt-0">
            <form action="{{ route('signup') }}" method="POST" >
                @csrf
                <div class="mb-5">
                    <label id="title" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Title
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        placeholder="Title"
                        class="border p-3 w-full rounded-md
                            @error('name')
                            border-red-500
                            @enderror
                        "
                        value="{{ old('title') }}"
                        >
                        @error('title')
                            <p class="bg-red-400 rounded-lg text-sm text-white font-bold p-1 text-center">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-5">
                    <label id="description" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Description
                    </label>
                    <textarea 
                        type="text" 
                        name="description" 
                        id="description" 
                        placeholder="Description"
                        class="border p-3 w-full rounded-md
                            @error('description')
                            border-red-500
                            @enderror
                        "
                    >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="bg-red-400 rounded-lg text-sm text-white font-bold p-1 text-center">{{ $message }}</p>
                        @enderror
                </div>
                
                <div class="w-full flex justify-end">
                    <input 
                        type="submit" 
                        value="Create post" 
                        class="bg-green-600 rounded hover:bg-green-700 cursor-pointer w-full h-10 text-white">
                        
                </div>
            </form>
        </div>
    </div>
@endsection