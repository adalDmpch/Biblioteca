<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                'username' => ['required', 'string', 'max:15', 'regex:/^[a-zA-Z0-9]+$/', 'unique:usuarios'],
                'number' => ['required', 'string', 'size:10', 'regex:/^[0-9]{10}$/'],
                'email' => ['required', 'string', 'email', 'max:100', 'unique:usuarios'],
                'password' => ['required', 'string', 'min:6', 'max:15']
            ], [
                'name.regex' => 'El nombre solo puede contener letras y espacios',
                'username.regex' => 'El nombre de usuario solo puede contener letras y números',
                'username.unique' => 'Este nombre de usuario ya está en uso',
                'number.size' => 'El número de teléfono debe tener 10 dígitos',
                'number.regex' => 'El número de teléfono solo puede contener números',
                'email.unique' => 'Este correo electrónico ya está registrado',
                'password.min' => 'La contraseña debe tener al menos 6 caracteres',
                'password.max' => 'La contraseña no puede tener más de 15 caracteres'
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Crear el usuario
            DB::table('usuarios')->insert([
                'name' => $request->name,
                'username' => $request->username,
                'number' => $request->number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'fecha_registro' => now(),
                'activo' => true
            ]);

            // Obtener el usuario recién creado
            $user = DB::table('usuarios')
                     ->where('email', $request->email)
                     ->first();

            // Iniciar sesión
            if ($user) {
                auth()->loginUsingId($user->id);
                return redirect()->route('home')
                               ->with('success', '¡Registro exitoso! Bienvenido a Jaydey.');
            }

            return back()
                ->with('error', 'Hubo un problema al crear tu cuenta. Por favor, intenta nuevamente.')
                ->withInput();

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Error al registrar usuario: ' . $e->getMessage())
                ->withInput();
        }
    }
}