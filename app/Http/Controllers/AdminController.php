<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Método para agregar un nuevo usuario
    public function addUser(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        // Encriptar la contraseña
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Crear un nuevo usuario
        User::create($validatedData);

        // Redireccionar de regreso y mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Usuario agregado correctamente');
    }

    // Método para editar un usuario existente
    public function editUser(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'username' => 'required|string|max:255|unique:users,username,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        // Buscar al usuario por su ID
        $user = User::findOrFail($id);

        // Actualizar los datos del usuario
        $user->fill($validatedData);

        // Actualizar la contraseña si se proporciona una nueva
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Guardar los cambios en el usuario
        $user->save();

        // Redireccionar de regreso y mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Usuario actualizado correctamente');
    }

    // Método para eliminar un usuario
    public function deleteUser($id)
    {
        // Buscar al usuario por su ID y eliminarlo
        $user = User::findOrFail($id);
        $user->delete();

        // Redireccionar de regreso y mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }

    // Método para mostrar la lista de usuarios
    public function showUsers()
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Devolver la vista de la lista de usuarios con los datos
        return view('admin.users', compact('users'));
    }

    // Método para mostrar el formulario de edición de usuario
    public function editUserForm($id)
    {
        // Buscar al usuario por su ID
        $user = User::findOrFail($id);

        // Devolver la vista del formulario de edición con los datos del usuario
        return view('admin.edit-user', compact('user'));
    }
}
