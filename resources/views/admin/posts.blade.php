@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Administrar Publicaciones</h1>

    <h2>Publicaciones Pendientes</h2>
    @if ($pendingPosts->isEmpty())
    <p>No hay publicaciones pendientes de aprobación.</p>
    @else
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Contenido</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingPosts as $post)
                    <tr>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->user->username }}</td>
                        <td>
                            <form action="{{ route('admin.posts.approve', $post->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Aprobar</button>
                            </form>
                            <form action="{{ route('admin.posts.reject', $post->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Rechazar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Volver al Dashboard</a>
</div>
@endsection
