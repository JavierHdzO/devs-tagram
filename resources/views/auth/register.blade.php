@extends('layouts.app');

@section('title')
    Sign up
@endsection

@section('container')
    <div class="md:flex">
        <div class="md:w-1/2">
            <p>Image here</p>
        </div>
        <div class="md:w-1/2">
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
                        class="border p-3 w-4/6 rounded-md"
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
                        class="border p-3 w-4/6 rounded-md"
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
                        class="border p-3 w-4/6 rounded-md"
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
                        class="border p-3 w-4/6 rounded-md"
                        >
                </div>
                <div class="mb-5">
                    <label id="password_conf" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Password
                    </label>
                    <input 
                        type="password" 
                        name="password_conf" 
                        id="password_conf" 
                        placeholder="Confirm Password"
                        class="border p-3 w-4/6 rounded-md"
                        >
                </div>
            </form>
        </div>
    </div>
@endsection