@vite('resources/css/app.css')
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-3xl font-semibold text-gray-800">Editar Usuario</h1>
    <form method="POST" action="{{ route('admin.user.edit', $user->id) }}" class="mt-6">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Información Personal</h2>
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 font-semibold mb-2">Nombres</label>
                    <input type="text" class="form-input w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="first_name" name="first_name" value="{{ $user->first_name }}" required readonly>
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 font-semibold mb-2">Apellidos</label>
                    <input type="text" class="form-input w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="last_name" name="last_name" value="{{ $user->last_name }}" required readonly>
                </div>
                <div class="mb-4">
                    <label for="birthdate" class="block text-gray-700 font-semibold mb-2">Fecha de Nacimiento</label>
                    <input type="date" class="form-input w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="birthdate" name="birthdate" value="{{ $user->birthdate }}" required readonly>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Información de Cuenta</h2>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
                    <input type="text" class="form-input w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="username" name="username" value="{{ $user->username }}" required readonly>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" class="form-input w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="email" name="email" value="{{ $user->email }}" required readonly>
                </div>
                <div class="mb-4">
                    <label for="is_admin" class="block text-gray-700 font-semibold mb-2">Rol</label>
                    <select class="form-select w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="is_admin" name="is_admin" required readonly>
                        <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>Usuario</option>
                        <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Administrador</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botón para editar/guardar cambios -->
        <button id="editButton" type="button" onclick="toggleEditMode()" class="mt-6 inline-block px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:ring-indigo-500">Editar</button>
        <button id="saveButton" type="submit" class="hidden mt-6 inline-block px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:border-green-700 focus:ring-green-500">Guardar</button>
        <a href="{{ route('admin.users') }}" class="mt-6 inline-block px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:border-gray-700 focus:ring-gray-500">Atrás</a>
    </form>

    <!-- Botón para modificar la contraseña -->
    <button onclick="togglePasswordFields()" class="mt-4 inline-block px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:border-gray-700 focus:ring-gray-500">Modificar Contraseña</button>

    <!-- Campos de contraseña (inicialmente ocultos) -->
    <div id="passwordFields" class="hidden mt-4 bg-white rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Cambiar Contraseña</h2>
        <div class="mb-4">
            <label for="new_password" class="block text-gray-700 font-semibold mb-2">Nueva Contraseña</label>
            <input type="password" class="form-input w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="new_password" name="new_password">
        </div>
        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirmar Nueva Contraseña</label>
            <input type="password" class="form-input w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" id="new_password_confirmation" name="new_password_confirmation">
        </div>
        <button type="submit" class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:ring-indigo-500">Actualizar Contraseña</button>
    </div>
</div>

<script>
    function toggleEditMode() {
        var editButton = document.getElementById('editButton');
        var saveButton = document.getElementById('saveButton');
        var inputs = document.querySelectorAll('input, select');

        if (editButton.innerText === 'Editar') {
            editButton.innerText = 'Cancelar';
            saveButton.classList.remove('hidden');
            inputs.forEach(input => {
                input.removeAttribute('readonly');
            });
        } else {
            editButton.innerText = 'Editar';
            saveButton.classList.add('hidden');
            inputs.forEach(input => {
                input.setAttribute('readonly', true);
            });
        }
    }


    function togglePasswordFields() {
        var passwordFields = document.getElementById('password Fields');
        if (passwordFields.classList.contains('hidden')) {
            passwordFields.classList.remove('hidden');
        } else {
            passwordFields.classList.add('hidden');
        }
    }
</script>
@endsection
