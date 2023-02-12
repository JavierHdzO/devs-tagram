@extends('layouts.app')

@section('title')
    Profile: {{ $user->username }}
@endsection

@section('container')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 text-white px-5 ">
                <img 
                    {{-- class="md:object-scale-down" --}}
                    src="{{ asset('img/usuario.svg') }}" 
                    alt="Post image">
            </div>
            <div class="md:w-8/12 lg:w-6/12 text-white px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <p class="text-gray-300 text-2xl" >{{ $user->username }}</p>
                <p class="text-gray-500 text-md mb-3 mt-1 font-bold">
                    0
                    <span class="font-normal"> Followers</span>
                </p>
                <p class="text-gray-500 text-md mb-3 mt-1 font-bold">
                    0
                    <span class="font-normal"> Following</span>
                </p>
                <p class="text-gray-500 text-md mb-3 mt-1 font-bold">
                    0
                    <span class="font-normal"> Posts</span>
                </p>
            </div>
        </div>
    </div>
@endsection

