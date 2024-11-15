<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth/register');
    }

    // Procesar el registro de usuarios
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        // Crear usuario
        $user = $this->create($request->all());

        // Autenticar al usuario recién registrado
        auth()->login($user);

        return redirect()->route('home'); // Cambia esto según tu lógica
    }

    // Validación del formulario de registro
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Crear usuario
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

