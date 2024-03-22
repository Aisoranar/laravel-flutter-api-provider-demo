@vite('resources/css/app.css')
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-8">Dashboard</h1>
        
        <!-- Formulario para crear una nueva publicación -->
        @if (auth()->user()->is_admin)
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Crear Nueva Publicación</h2>
                <form action="{{ route('create.post') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Contenido de la publicación</label>
                        <textarea class="form-textarea mt-1 block w-full rounded-md border-gray-300 focus:border-blue-400 focus:ring focus:ring-blue-400" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Crear Publicación</button>
                </form>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Listado de publicaciones del usuario -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Mis Publicaciones</h2>
                @foreach ($posts as $post)
                    <div class="bg-white rounded-md shadow-md mb-4 p-4">
                        <p>{{ $post->content }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Listado de publicaciones pendientes de aprobación -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Publicaciones Pendientes</h2>
                @foreach ($pendingPosts as $pendingPost)
                    <div class="bg-white rounded-md shadow-md mb-4 p-4">
                        <p>{{ $pendingPost->content }}</p>
                        <!-- Agrega aquí cualquier otra información relevante sobre la publicación pendiente -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
