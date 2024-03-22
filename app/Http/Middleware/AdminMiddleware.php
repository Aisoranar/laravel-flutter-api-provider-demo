<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario actual es un administrador
        if ($request->user() && $request->user()->is_admin) {
            return $next($request);
        }

        // Si no es un administrador, redirigir a alguna otra vista o lanzar una excepción
        return redirect('/')->with('error', 'No tienes permisos de administrador');
    }
}
