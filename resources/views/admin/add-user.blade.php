<!-- resources/views/admin/add-user.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Usuario</h1>
        <form method="POST" action="{{ url('/admin/user/add') }}">
            @csrf
            <div class="form-group">
                <label for="first_name">Nombres</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <!-- Agregar los campos restantes aquí -->
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
@endsection
