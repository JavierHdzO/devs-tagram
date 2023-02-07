<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Devstragram - @yield('title')</title>
</head>
<body class="bg-black"
    <header class="p-5 border-b  shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black text-green-600/90">
                Devstagram
            </h1>
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-200 text-sm" href="#">Sign up </a>
                <a class="font-bold uppercase text-gray-200 text-sm" href="#">Sign in</a>
            </nav>
        </div>
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10 text-gray-300">
                @yield('title')
            </h2>
            @yield('container')
        </main>
        <footer class="text-gray-400 text-center font-bold">
            @ Devstragran - All rights reserved {{ now()->year }}
            {{-- @php
                echo date('Y');
            @endphp --}}
        </footer>
    </header>
    
</body>
</html>