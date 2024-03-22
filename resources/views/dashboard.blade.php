@vite('resources/css/app.css')
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">¡Bienvenido a tu Dashboard!</h1>

    <!-- Formulario para crear una nueva publicación -->
    <div class="bg-white rounded-md shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4">Crear Nueva Publicación</h2>
        <form action="{{ route('post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Escribe tu nueva publicación:</label>
                <textarea class="form-textarea mt-1 block w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400" id="content" name="content" rows="3" placeholder="Comparte tus pensamientos..." required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Publicar</button>
        </form>
    </div>

    <!-- Sección de publicaciones -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Botón para mostrar/ocultar las publicaciones del usuario -->
        <div>
            <button id="toggleUserPosts" class="flex items-center text-lg font-semibold text-blue-500 focus:outline-none border-2 border-blue-500 rounded-md px-4 py-2 hover:bg-blue-500 hover:text-white transition duration-300">
                <span>Mostrar tus publicaciones</span>
                <i class="fas fa-chevron-down ml-1"></i>
            </button>
        </div>

        <!-- Listado de publicaciones del usuario -->
        <div id="userPosts" style="display: none;">
            <h2 class="text-xl font-semibold mb-4">Tus Publicaciones</h2>
            @forelse ($userPosts as $post)
            <div class="bg-blue-200 rounded-md shadow-md mb-4 p-6">
                <p class="text-gray-800">{{ $post->content }}</p>
            </div>
            @empty
            <p class="text-gray-500">No tienes publicaciones todavía.</p>
            @endforelse
        </div>

        <!-- Listado de publicaciones pendientes de aprobación -->
        <div>
            <h2 class="text-xl font-semibold mb-4">Publicaciones Pendientes</h2>
            @forelse ($pendingPosts as $pendingPost)
            <div class="bg-yellow-200 rounded-md shadow-md mb-4 p-6">
                <p class="text-gray-800">{{ $pendingPost->content }}</p>
                <p class="text-sm text-yellow-600 mt-2 flex items-center"><i class="fas fa-exclamation-circle mr-1"></i>Pendiente de Aprobación</p>
            </div>
            @empty
            <p class="text-gray-500">No hay publicaciones pendientes.</p>
            @endforelse
        </div>
    </div>

    <!-- Listado de publicaciones globales -->
    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Publicaciones Globales</h2>
        @forelse ($globalPosts as $post)
        <div class="bg-green-200 rounded-md shadow-md mb-4 p-6">
            <p class="text-gray-800">{{ $post->content }}</p>
            <p class="text-sm text-gray-600 mt-2 flex items-center"><i class="fas fa-user mr-1"></i>Publicado por: {{ $post->user->first_name }} {{ $post->user->last_name }}</p>
        </div>
        @empty
        <p class="text-gray-500">No hay publicaciones globales aún.</p>
        @endforelse
    </div>
</div>

<!-- Estilos CSS personalizados -->
<style>
    /* Estilos para el ícono de pendiente de aprobación */
    .fa-exclamation-circle {
        color: #f6e05e;
    }

    /* Estilos para el ícono de usuario */
    .fa-user {
        color: #4a5568;
    }

    /* Estilos para el ícono de flecha */
    .fa-chevron-down {
        transform: rotate(90deg);
    }

    /* Estilos adicionales */
    .form-textarea {
        resize: none;
    }

    #toggleUserPosts {
        transition: background-color 0.3s ease;
    }

    #toggleUserPosts:hover {
        background-color: #4299e1;
        color: white;
    }
</style>

<!-- JavaScript para mostrar/ocultar las publicaciones del usuario -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggleUserPosts');
        const userPosts = document.getElementById('userPosts');

        toggleButton.addEventListener('click', function () {
            if (userPosts.style.display === 'none') {
                userPosts.style.display = 'block';
                toggleButton.innerHTML = 'Ocultar tus publicaciones <i class="fas fa-chevron-up ml-1"></i>';
            } else {
                userPosts.style.display = 'none';
                toggleButton.innerHTML = 'Mostrar tus publicaciones <i class="fas fa-chevron-down ml-1"></i>';
            }
        });
    });
</script>

@endsection
