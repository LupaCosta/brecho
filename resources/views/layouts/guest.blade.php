<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans text-gray-900 antialiased min-h-screen flex flex-col justify-center items-center px-4">

    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">

        <!-- Logo + Title -->
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-blue-700">{{ config('app.name', 'Laravel') }}</h1>
            <p class="mt-2 text-gray-600">Bem-vindo(a)! Por favor, faça login ou registre-se para continuar.</p>
        </div>

        @yield('content')

    </div>

</body>
</html>
