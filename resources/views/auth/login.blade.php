@extends('layouts.app')

@section('title')
    Sign in
@endsection

@section('container')

    <div class="md:fle">
        <div class="md:w-1/2">
            <img src="{{ asset('img/login.jpg') }}" alt="Login Image">
        </div>
        <div class="md:w-4/12 md:justify-center bg-gray-300 p-6 rounded-lg shadow-lg shadow-white">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="email" class="mb-2 bloc uppercase text-gray-500 font-bold text-sm">
                        Email
                    </label>
                    <input 
                        type="email"
                        name="email"
                        id="email"
                        placeholder="name"
                        class=" border p-3 w-full rounded-md
                            @error('email')
                                border-red-400
                            @enderror
                        "
                        value="{{ old('email') }}"
                    />
                    <p class="bg-red-400 rounded-md text-sm font-bold p-1 text-center">{{ $message }}</p>

                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 bloc uppercase text-gray-500 font-bold text-sm">
                        Password
                    </label>
                    <input 
                        type="password"
                        name="password"
                        id="password"
                        placeholder="name"
                        class=" border p-3 w-full rounded-md
                            @error('password')
                                border-red-400
                            @enderror
                        "
                        value="{{ old('email') }}"
                    />
                    <p class="bg-red-400 rounded-md text-sm font-bold p-1 text-center">{{ $message }}</p>
                </div>

                <div class="w-full flex justify-end">
                    <input 
                        type="submit" 
                        value="Submit" 
                        class="bg-green-600 rounded hover:bg-green-700 cursor-pointer w-full h-10 text-white">
                </div>
            </form>
            @error('credentials')
                <p class="bg-red-400 text-sm rounded-sm font-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
@endsection