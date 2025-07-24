<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- If you're using Laravel Mix, it would be: --}}
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    </head>
    {{-- IMPORTANT: Update the body tag below --}}
    <body class="font-sans text-gray-900 antialiased bg-dark-primary">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    {{-- IMPORTANT: Update the x-application-logo below --}}
                    <h1 style="color:yellow">tikle</h1>
                </a>
            </div>

            {{-- IMPORTANT: Update the div below for the form container --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-dark-secondary shadow-lg overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
