<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ], [
                'email.required' => 'El correo electrónico es obligatorio',
                'email.email' => 'Ingresa un correo electrónico válido',
                'password.required' => 'La contraseña es obligatoria'
            ]);

            // Obtener usuario de la base de datos
            $user = DB::table('usuarios')
                     ->where('email', $request->email)
                     ->where('activo', true)
                     ->first();

            if ($user && password_verify($request->password, $user->password)) {
                // Iniciar sesión
                Auth::loginUsingId($user->id);
                
                // Si el usuario marcó "recordarme"
                if ($request->has('remember')) {
                    return redirect()->intended('/')
                                   ->withCookie(cookie('email', $request->email, 45000))
                                   ->with('success', '¡Bienvenido de nuevo!');
                }

                return redirect()->intended('/')
                               ->with('success', '¡Bienvenido de nuevo!');
            }

            return back()
                ->withErrors(['email' => 'Las credenciales proporcionadas no son correctas.'])
                ->withInput($request->except('password'));

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Error al iniciar sesión: ' . $e->getMessage())
                ->withInput($request->except('password'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', '¡Hasta pronto!');
    }
}