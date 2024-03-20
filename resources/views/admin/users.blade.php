@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <a href="{{ url("/admin/user/add") }}" class="btn btn-success mb-3">Agregar Usuario</a>
        <a href="{{ url("/admin/users") }}" class="btn btn-info mb-3">Ver Lista de Usuarios</a>
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
                        <!-- Botón de edición -->
                        <a href="{{ url("/admin/user/{$user->id}/edit") }}" class="btn btn-primary btn-sm">Editar</a>
                        <!-- Formulario para eliminar -->
                        <form action="{{ url("/admin/user/{$user->id}/delete") }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
