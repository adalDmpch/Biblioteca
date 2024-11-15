<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Devuelve la vista de contacto
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Procesar la lógica de envío del formulario de contacto
        // Ejemplo: Validar y guardar datos en la base de datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        // Lógica para manejar los datos, como enviarlos por correo o guardarlos
        // Aquí podrías redirigir o retornar una respuesta.
        return back()->with('success', '¡Gracias por contactarnos!');
    }
}
