<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Devstragram - @yield('title')</title>
</head>
<body class="bg-black"
    <header class="p-5 border-b  shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black text-green-600/90">
                Devstagram
            </h1>
            <nav class="flex gap-2 mt-8 items-center">
                @auth
                    <a href="{{ route('posts.create')}}" 
                    class="flex items-center gap-2 border-gray-600 p-2 text-gray-400 rounded text-sn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        Create                         
                    </a>
                    <a class="font-bold uppercase text-gray-200 text-md mr-15"
                        href="{{ route('posts.index', auth()->user()->username) }}"
                        >
                        Hi,
                        <span class="text-sm">{{ auth()->user()->username }}</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="border-green-600 border-solid border-2 rounded-lg px-5 py-2  font-bold uppercase text-gray-200 text-sm hover:bg-green-600" type="submit" value="Logout"/> 
                    </form>
                @endauth

                @guest
                    <a class="font-bold uppercase text-gray-200 text-sm" href="{{ route('login')}}">Sign in</a>
                    <a class="font-bold uppercase text-gray-200 text-sm" href="{{ route('signup') }}">Sign up </a>
                @endguest
            </nav>
        </div>
        <main class="container mx-auto mt-10 w-full">
            <h2 class="font-black text-center text-3xl mb-10 text-gray-300">
                @yield('title')
            </h2>
            @yield('container')
        </main>
        <footer class="text-gray-400 text-center font-bold mt-5">
            @ Devstragran - All rights reserved {{ now()->year }}
            {{-- @php
                echo date('Y');
            @endphp --}}
        </footer>
    </header>
    
</body>
</html>