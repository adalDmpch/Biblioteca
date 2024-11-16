<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        if (!$user || $user->rol_id !== 1) {
            return redirect()->route('home')
                ->with('error', 'No tienes permisos para acceder a esta área.');
        }

        return $next($request);
    }
}