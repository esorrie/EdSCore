<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> EdScore </title>

        <!-- Fonts -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-black font-sans antialiased">
    <x-navbar />

        <div class="container mx-auto ">
           {{-- @include('layouts.navigation') --}}
            <!-- Page Content -->
            <main>
                @yield('content')
                
            </main>
        </div>
    </body>
</html>
