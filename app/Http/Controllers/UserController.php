<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserController extends Controller
{
    // Método para registrar un nuevo usuario
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return redirect('/login')->with('success', 'Usuario registrado correctamente');
    }

    // Método para mostrar el perfil del usuario
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Método para crear una nueva publicación
    public function post(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Obtener al usuario actual
        $user = Auth::user();

        // Crear una nueva publicación asociada al usuario actual
        $post = new Post([
            'content' => $validatedData['content'],
            'approved' => $user->is_admin ? true : false, // Marcar como aprobada si es administrador
        ]);

        // Guardar la publicación
        $user->posts()->save($post);

        // Redirigir al panel de control con un mensaje
        return redirect()->route('dashboard')->with('success', 'Publicación creada correctamente' . ($user->is_admin ? '.' : '. Debe ser aprobada por el administrador.'));
    }

    // Método para iniciar sesión
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si las credenciales son válidas, redirigir al usuario a su perfil
            return redirect('/profile');
        } else {
            // Si las credenciales no son válidas, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas no son válidas.',
            ]);
        }
    }

    // Método para mostrar el panel de control del usuario
    public function dashboard()
    {
        // Obtener al usuario actual
        $user = Auth::user();

        // Obtener las publicaciones aprobadas del usuario actual
        $userPosts = $user->posts()->where('approved', true)->get();
        
        // Obtener las publicaciones pendientes de aprobación del usuario actual
        $pendingPosts = Post::where('user_id', $user->id)
                            ->where('approved', false)
                            ->get();

        // Obtener todas las publicaciones globales, excluyendo las propias si es administrador
        $globalPostsQuery = Post::where('approved', true);
        if (!$user->is_admin) {
            $globalPostsQuery->where('user_id', '!=', $user->id);
        }
        $globalPosts = $globalPostsQuery->get();

        return view('dashboard', compact('userPosts', 'pendingPosts', 'globalPosts'));
    }
}
