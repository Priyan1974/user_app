<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

        <!-- Welcome Text -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-semibold">Welcome to Laravel</h1>
        </div>

        <!-- Card Container -->
        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-sm text-center">
            @if (Route::has('login'))
                <div class="flex flex-col gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="w-full px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="w-full px-5 py-2 border border-gray-300 text-gray-800 rounded-lg hover:border-gray-500">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="w-full px-5 py-2 border border-gray-300 text-gray-800 rounded-lg hover:border-gray-500">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </body>
</html>
