<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Visualisasi Profil Kesehatan Lamongan') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
    background: 
        radial-gradient(circle at 95% 5%, rgba(210, 220, 2, 0.25) 10%, transparent 40%),
        radial-gradient(circle at 5% 95%, rgba(22, 179, 172, 0.25) 10%, transparent 40%),
        #ffffff;
}


        .auth-container {
            background: white;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/">
                <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="Logo" class="w-20 h-20">
            </a>
        </div>

        <div class="auth-container w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
