@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Perfil de Usuario</h1>
        <ul>
            <li><strong>Nombres:</strong> {{ $user->first_name }}</li>
            <li><strong>Apellidos:</strong> {{ $user->last_name }}</li>
            <li><strong>Fecha de nacimiento:</strong> {{ $user->birthdate }}</li>
            <li><strong>Edad:</strong> {{ $user->birthdate->diffInYears(now()) }}</li>
            <li><strong>Username:</strong> {{ $user->username }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
        </ul>
    </div>
@endsection
