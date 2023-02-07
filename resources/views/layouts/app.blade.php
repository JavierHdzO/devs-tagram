<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>Devstragram - @yield('title')</title>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</head>
<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto fle justify-between items-center">
            <h1 class="text-3xl text-sky-500">@yield('title')</h1>

        </div>
        <p class="text-3xl text-sky-500" >;alsd </p>
    </header>
    
</body>
</html>