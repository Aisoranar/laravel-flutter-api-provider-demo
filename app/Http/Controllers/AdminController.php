<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Método para mostrar el formulario de agregar un nuevo usuario
    public function showAddUserForm()
    {
        return view('admin.add-user');
    }

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

        // Redireccionar a la lista de usuarios del panel de administración
        return redirect()->route('admin.users')->with('success', 'Usuario agregado correctamente');
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

    // Método para mostrar las publicaciones pendientes de aprobación
    public function showPendingPosts()
    {
        // Obtener las publicaciones pendientes de aprobación
        $pendingPosts = Post::where('approved', false)->get();

        return view('admin.posts', compact('pendingPosts'));
    }

    // Método para aprobar una publicación pendiente
    public function approvePost($postId)
    {
        // Buscar la publicación por su ID
        $post = Post::findOrFail($postId);

        // Marcar la publicación como aprobada
        $post->approved = true;
        
        // Guardar los cambios en la base de datos
        $post->save();

        // Redireccionar de regreso y mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Publicación aprobada correctamente');
    }

    // Método para rechazar una publicación pendiente
    public function rejectPost($postId)
    {
        // Buscar la publicación por su ID y eliminarla
        $post = Post::findOrFail($postId);
        $post->delete();

        // Redireccionar de regreso y mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Publicación rechazada correctamente');
    }

    // Método para actualizar la contraseña de un usuario
    public function updatePassword(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Buscar al usuario por su ID
        $user = User::findOrFail($id);

        // Actualizar la contraseña
        $user->password = Hash::make($validatedData['new_password']);
        $user->save();

        // Redireccionar de regreso y mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Contraseña actualizada correctamente');
    }
}
