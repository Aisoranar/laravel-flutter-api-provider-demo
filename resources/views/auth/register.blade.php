@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

        </form>
    </div>
@endsection
