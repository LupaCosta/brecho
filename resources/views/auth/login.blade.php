@extends('layouts.guest')

@section('content')
<form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
    @csrf

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" name="email" type="email" required autofocus autocomplete="username" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
    </div>

    <!-- Password -->
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
        <input id="password" name="password" type="password" required autocomplete="current-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
    </div>

    <!-- Remember Me -->
    <div class="flex items-center">
        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
        <label for="remember_me" class="ml-2 block text-sm text-gray-900">Lembrar-me</label>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Entrar
        </button>
    </div>
</form>
@endsection
