@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <a href="{{ route("admin.user.add.form") }}" class="btn btn-success mb-3">Agregar Usuario</a>
        <table class="table">
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Administrador' : 'Usuario' }}</td>
                    <td>
                        <a href="{{ route("admin.user.edit.form", $user->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route("admin.user.delete", $user->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
