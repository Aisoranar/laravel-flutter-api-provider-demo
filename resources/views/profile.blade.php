@vite('resources/css/app.css')
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-gradient-to-br from-white to-gray-200 rounded-lg shadow-xl">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-semibold text-gray-800">Perfil de Usuario</h1>
        <div>
            <a href="{{ route('admin.users') }}" class="text-gray-800 hover:text-indigo-700">Ver otros usuarios</a>
            <a href="{{ route('admin.posts.pending') }}" class="text-gray-800 hover:text-indigo-700 ml-4">Ver publicaciones pendientes</a>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-lg font-semibold text-gray-800 mb-4">Información Personal</p>
            <ul class="space-y-4">
                <li class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <span class="text-gray-800 font-semibold">Nombres:</span> 
                    <span class="text-gray-700">{{ $user->first_name }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <span class="text-gray-800 font-semibold">Apellidos:</span> 
                    <span class="text-gray-700">{{ $user->last_name }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <span class="text-gray-800 font-semibold">Fecha de Nacimiento:</span> 
                    <span class="text-gray-700">{{ $user->birthdate }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <span class="text-gray-800 font-semibold">Edad:</span> 
                    <span class="text-gray-700">{{ \Carbon\Carbon::parse($user->birthdate)->age }}</span>
                </li>
            </ul>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-lg font-semibold text-gray-800 mb-4">Información de Cuenta</p>
            <ul class="space-y-4">
                <li class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <span class="text-gray-800 font-semibold">Username:</span> 
                    <span class="text-gray-700">{{ $user->username }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <span class="text-gray-800 font-semibold">Email:</span> 
                    <span class="text-gray-700">{{ $user->email }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="h-6 w-6 mr-2 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    <span class="text-gray-800 font-semibold">Rol:</span> 
                    <span class="text-gray-700">{{ $user->is_admin ? 'Administrador' : 'Usuario' }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
