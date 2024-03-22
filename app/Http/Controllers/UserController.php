<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserController extends Controller
{
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

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function post(Request $request)
    {
        // Lógica para realizar una publicación
    }

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

    public function dashboard()
    {
        // Obtener las publicaciones aprobadas del usuario actual
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)
                     ->where('approved', true)
                     ->get();
        
        // Obtener las publicaciones pendientes de aprobación
        $pendingPosts = Post::where('user_id', $user->id)
                            ->where('approved', false)
                            ->get();

        return view('dashboard', compact('posts', 'pendingPosts'));
    }

    public function createPost(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Crear una nueva publicación asociada al usuario actual
        $user = Auth::user();
        $post = new Post([
            'content' => $validatedData['content'],
            'approved' => false, // Por defecto, las publicaciones no están aprobadas
        ]);
        $user->posts()->save($post);

        return redirect()->route('dashboard')->with('success', 'Publicación creada correctamente. Debe ser aprobada por el administrador.');
    }
}
