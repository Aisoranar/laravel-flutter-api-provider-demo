@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>
        <form method="POST" action="{{ url("/admin/user/{$user->id}/edit") }}">
            @csrf
            <div class="form-group">
                <label for="first_name">Nombres</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
            </div>
            <!-- Agregar los campos restantes aquí con sus respectivos valores -->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
