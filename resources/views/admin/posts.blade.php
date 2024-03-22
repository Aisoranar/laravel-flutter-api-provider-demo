@vite('resources/css/app.css')
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Administrar Publicaciones</h1>

    <h2 class="text-xl font-semibold mb-4">Publicaciones Pendientes</h2>
    @if ($pendingPosts->isEmpty())
    <p class="text-gray-500">No hay publicaciones pendientes de aprobación.</p>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-2 gap-y-4 auto-rows-auto">
        @foreach ($pendingPosts as $post)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-sm mx-auto">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 text-gray-800">Contenido</div>
                <p class="text-gray-700 text-base overflow-hidden" style="max-height: 6.5rem; word-wrap: break-word;">{{ $post->content }}</p>
            </div>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 text-gray-800">Usuario</div>
                <p class="text-gray-700 text-base">{{ $post->user->username }}</p>
            </div>
            <div class="px-6 py-4 flex justify-center">
                <form action="{{ route('admin.posts.approve', $post->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300">Aprobar</button>
                </form>
                <form action="{{ route('admin.posts.reject', $post->id) }}" method="POST" class="inline ml-4">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">Rechazar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4 inline-block hover:bg-blue-600 transition duration-300">Volver al Dashboard</a>
</div>
</div>
@endsection

<style>
    /* Estilos adicionales */
    .bg-white {
        background-color: #F7FAFC;
    }

    .text-gray-800 {
        color: #2D3748;
    }

    .text-gray-700 {
        color: #4A5568;
    }

    .hover\:bg-green-600:hover {
        background-color: #2F855A;
    }

    .hover\:bg-red-600:hover {
        background-color: #C53030;
    }
</style>
