<!-- C:\laragon\www\laravel-api\resources\views\admin\users.blade.php -->
@vite('resources/css/app.css')
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="container mx-auto p-6 bg-gradient-to-br from-white to-gray-200 rounded-lg shadow-xl">

    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Lista de Usuarios</h1>

    <div class="flex justify-end mb-4">
        <a href="{{ url("/admin/user/add") }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Agregar Nuevo Usuario</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($users as $user)
        <div id="user_card_{{ $user->id }}" class="max-w-md bg-white rounded-lg shadow-md overflow-hidden @if($loop->last) resaltar @endif">
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">{{ $user->first_name }} {{ $user->last_name }}</h2>
                
                <div class="text-gray-800">{{ $user->is_admin ? 'Administrador' : 'Usuario' }}</div>
                
                <div class="grid grid-cols-2 gap-2 mt-4">
                    
                    <div class="text-gray-600">Fecha de Nacimiento:</div>
                    <div class="text-gray-800">{{ $user->birthdate }}</div>
                    <div class="text-gray-600">Username:</div>
                    <div class="text-gray-800">{{ $user->username }}</div>
                    <div class="text-gray-600">Email:</div>
                    <div class="text-gray-800">{{ $user->email }}</div>
                    <div class="text-gray-600">Correo:</div>
                    <p class="text-gray-600">{{ $user->email }}</p>
                    
                </div>
            </div>
            <div class="flex justify-end p-4">
                <div class="flex items-center">
                    <a href="{{ url("/admin/user/{$user->id}/edit") }}" class="inline-flex items-center px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 mr-2">
                        <svg class="w-4 h-4 fill-current mr-2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M2.5 13.25a1 1 0 011-1h12a1 1 0 110 2h-12a1 1 0 01-1-1zM17.5 6.25a1 1 0 00-1-1h-2.938a3.001 3.001 0 01-5.124-2.124 1 1 0 10-1.95.436A5.002 5.002 0 002.561 8.44a1 1 0 00.936 1.384 1 1 0 00.98-.731A3.001 3.001 0 0110.562 7H15.5a1 1 0 001-1zM13.5 8.25h-3a1 1 0 01-1-1V4.81l3.274-3.274a1 1 0 111.414 1.414L11.915 4.81H14.5v2.44a1 1 0 01-1 1zm-2-2a1 1 0 000-2 1 1 0 000 2z" clip-rule="evenodd"/></svg>
                        Editar
                    </a>
                    <form action="{{ url("/admin/user/{$user->id}/delete") }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                            <svg class="w-4 h-4 fill-current mr-2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 3a1 1 0 011-1h6a1 1 0 011 1v1h2a1 1 0 011 1v12a2 2 0 01-2 2H5a2 2 0 01-2-2V5a1 1 0 011-1h2V3zm2 2v10h2V5H8zm4 0v10h2V5h-2zm-4 3a1 1 0 00-1 1v5a1 1 0 102 0v-5a1 1 0 00-1-1zm4 0a1 1 0 00-1 1v5a1 1 0 102 0v-5a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<style>
    /* Agrega estilos para resaltar la tarjeta del usuario */
    .resaltar {
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
    }
</style>

<script>
    // Detectar cuando se carga la página
    window.addEventListener('DOMContentLoaded', function() {
        // Encontrar la tarjeta del usuario más reciente y resaltarla
        var userCards = document.querySelectorAll('.max-w-md.bg-white.rounded-lg.shadow-md.overflow-hidden');
        var lastUserCard = userCards[userCards.length - 1];
        lastUserCard.classList.add('resaltar');

        // Después de 3 segundos, quitar el resaltado
        setTimeout(function() {
            lastUserCard.classList.remove('resaltar');
        }, 3000);
    });
</script>
