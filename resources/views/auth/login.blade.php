@vite('resources/css/app.css')
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md overflow-hidden">
        <div class="flex justify-center py-4">
            <svg class="h-12 w-auto text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a4 4 0 11-8 0 4 4 0 018 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a4 4 0 11-8 0 4 4 0 018 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
        </div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">{{ __('Iniciar sesión') }}</h2>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="px-10">
                <div>
                    <label for="email" class="sr-only">{{ __('Correo Electrónico') }}</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="input-field" placeholder="{{ __('Correo Electrónico') }}">
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="sr-only">{{ __('Contraseña') }}</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="input-field" placeholder="{{ __('Contraseña') }}">
                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="px-10 mt-2 flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        {{ __('Recordarme') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    </div>
                @endif
            </div>

            <div class="px-10 mt-4 mb-4">
                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Iniciar sesión') }}
                </button>
            </div>
        </form>

        <div class="text-center mb-8">
            <p class="text-sm text-gray-600">
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    {{ __('Regístrate aquí') }}
                </a>
            </p>
        </div>
    </div>
</div>
@endsection

<style>
    .input-field {
        appearance: none;
        border: 1px solid #D1D5DB;
        border-radius: 0.375rem;
        padding: 0.75rem;
        width: 100%;
        font-size: 1rem;
        line-height: 1.5;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .input-field:focus {
        outline: none;
        border-color: #4F46E5;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
    }

    .error-message {
        margin-top: 0.5rem;
        font-size: 0.875rem;
        color: #EF4444;
    }
</style>
