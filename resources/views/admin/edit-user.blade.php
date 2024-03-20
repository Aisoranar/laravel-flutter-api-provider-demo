@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>
        <form method="POST" action="{{ route('admin.user.edit', $user->id) }}">
            @csrf
            @method('PATCH') <!-- Cambiado a PATCH para actualizar el usuario -->

            <div class="form-group">
                <label for="first_name">Nombres</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
            </div>

            <div class="form-group">
                <label for="birthdate">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate }}" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <label for="is_admin">Rol</label>
                <select class="form-control" id="is_admin" name="is_admin" required>
                    <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>Usuario</option>
                    <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
