@vite('resources/css/app.css')
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md overflow-hidden">
        <div class="flex justify-center py-4">
            <svg class="h-12 w-auto text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7l8 4 8-4z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7l8 4 8-4z" />
            </svg>
        </div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">{{ __('Registro de Administrador') }}</h2>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('admin.user.add') }}">
            @csrf
            <div class="px-10">
                <div>
                    <label for="first_name" class="sr-only">{{ __('Nombres') }}</label>
                    <input id="first_name" name="first_name" type="text" autocomplete="first_name" required class="input-field" placeholder="{{ __('Nombres') }}">
                    @error('first_name')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="last_name" class="sr-only">{{ __('Apellidos') }}</label>
                    <input id="last_name" name="last_name" type="text" autocomplete="last_name" required class="input-field" placeholder="{{ __('Apellidos') }}">
                    @error('last_name')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="birthdate" class="sr-only">{{ __('Fecha de Nacimiento') }}</label>
                    <input id="birthdate" name="birthdate" type="date" autocomplete="birthdate" required class="input-field" placeholder="{{ __('Fecha de Nacimiento') }}">
                    @error('birthdate')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="username" class="sr-only">{{ __('Username') }}</label>
                    <input id="username" name="username" type="text" autocomplete="username" required class="input-field" placeholder="{{ __('Username') }}">
                    @error('username')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="sr-only">{{ __('Correo Electrónico') }}</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="input-field" placeholder="{{ __('Correo Electrónico') }}">
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="sr-only">{{ __('Contraseña') }}</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="input-field" placeholder="{{ __('Contraseña') }}">
                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password-confirm" class="sr-only">{{ __('Confirmar Contraseña') }}</label>
                    <input id="password-confirm" name="password_confirmation" type="password" autocomplete="new-password" required class="input-field" placeholder="{{ __('Confirmar Contraseña') }}">
                </div>
            </div>
            <div class="px-10 mt-8">
                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Crear nuevo usuario') }}</button>
                <a href="{{ route('admin.users') }}" class="mt-4 inline-block w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 flex items-center justify-center">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    {{ __('Volver atrás') }}
                </a>
            </div>
        </form>
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
