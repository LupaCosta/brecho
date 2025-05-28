@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Entrar na sua conta</h2>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required autofocus autocomplete="username"
                       class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                    <span class="ml-2 text-sm text-gray-600">Lembrar-me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Esqueceu a senha?</a>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-black font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1">
                    Entrar
                </button>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-4">
                <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:underline">
                    Não tem uma conta? <strong>Cadastre-se</strong>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
