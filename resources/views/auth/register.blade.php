@extends('layouts.app');

@section('title')
    Sign up
@endsection

@section('container')
    <div class="md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('img/register.jpg') }}" alt="Register Image">
        </div>
        <div class="md:w-4/12 md:justify-center bg-gray-300 p-6 rounded-lg shadow-lg shadow-white">
            <form action="">
                <div class="mb-5">
                    <label id="name" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        placeholder="Name"
                        class="border p-3 w-full rounded-md"
                        >
                </div>
                <div class="mb-5">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        placeholder="Username"
                        class="border p-3 w-full rounded-md"
                        >
                </div>
                <div class="mb-5">
                    <label id="email" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Email
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Email"
                        class="border p-3 w-full rounded-md"
                        >
                </div>
                <div class="mb-5">
                    <label id="password" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Password
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Password"
                        class="border p-3 w-full rounded-md"
                        >
                </div>
                <div class="mb-5">
                    <label id="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Password
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        placeholder="Confirm Password"
                        class="border p-3 w-full rounded-md"
                        >
                </div>
                <div class="w-full flex justify-end">
                    <input 
                        type="submit" 
                        value="Submit" 
                        class="bg-green-600 rounded hover:bg-green-700 cursor-pointer w-full h-10 text-white">
                </div>
            </form>
        </div>
    </div>
@endsection