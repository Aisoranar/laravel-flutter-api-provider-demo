<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class UserApiController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
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

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    /**
     * Login user and generate token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    /**
     * Logout user (revoke token).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    /**
     * Display user profile.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        $user = Auth::user();
        return response()->json(['user' => $user], 200);
    }

    /**
     * Create a new post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPost(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $post = new Post([
            'content' => $validatedData['content'],
            'approved' => $user->is_admin ? true : false,
        ]);

        $user->posts()->save($post);

        return response()->json(['message' => 'Post created successfully'], 201);
    }

    /**
     * Display user's posts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserPosts()
    {
        try {
            // Verificar si el usuario está autenticado
            $user = Auth::user();
            if (!$user) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Obtener los posts del usuario autenticado
            $userPosts = $user->posts;

            // Verificar si se encontraron posts
            if ($userPosts->isEmpty()) {
                return response()->json(['message' => 'No posts found for this user'], 404);
            }

            // Devolver los posts del usuario
            return response()->json(['posts' => $userPosts], 200);
        } catch (\Exception $e) {
            // Capturar y manejar errores
            return response()->json(['message' => 'Failed to load user posts', 'error' => $e->getMessage()], 500);
        }
    }
}
