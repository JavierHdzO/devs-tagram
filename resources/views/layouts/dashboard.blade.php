@extends('layouts.app')

@section('title')
Your Account
@endsection

@section('container')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 text-white px-5 ">
                <img 
                    {{-- class="object-contain h-48 w-96 md:object-scale-down" --}}
                    src="{{ asset('img/usuario.svg') }}" 
                    alt="Post image">
            </div>
            <div class="md:w-8/12 lg:w-6/12 text-white px-5 ">
                <p class="text-gray-300 text-2xl" >{{ auth()->user()->username }}</p>
            </div>
        </div>
    </div>
@endsection

