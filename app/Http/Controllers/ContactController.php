<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function submit(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:100',
                'correo' => 'required|email|max:100',
                'asunto' => 'required|string|max:200',
                'mensaje' => 'required|string'
            ]);

            DB::table('mensajes')->insert([
                'nombre' => $request->nombre,
                'correo' => $request->correo,
                'motivo' => $request->asunto,
                'mensaje' => $request->mensaje,
                'fecha_envio' => now()
            ]);

            return back()->with('success', '¡Gracias por contactarnos! Tu mensaje ha sido enviado exitosamente.');

        } catch (\Exception $e) {
            return back()
                ->with('error', 'Hubo un problema al enviar tu mensaje. Por favor, intenta nuevamente.')
                ->withInput();
        }
    }
}