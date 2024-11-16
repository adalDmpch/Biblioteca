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

            $user = DB::table('usuarios')
                     ->join('roles', 'usuarios.rol_id', '=', 'roles.id')
                     ->select('usuarios.*', 'roles.nombre as rol')
                     ->where('usuarios.email', $request->email)
                     ->where('usuarios.activo', true)
                     ->first();

            if ($user && password_verify($request->password, $user->password)) {
                Auth::loginUsingId($user->id);
                session(['rol' => $user->rol]); 
                
                if ($request->has('remember')) {
                    return redirect()->intended($user->rol === 'admin' ? '/admin' : '/')
                                   ->withCookie(cookie('email', $request->email, 45000))
                                   ->with('success', '¡Bienvenido de nuevo!');
                }

                return redirect()->intended($user->rol === 'admin' ? '/' : '/')
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', '¡Hasta pronto!');
    }
}