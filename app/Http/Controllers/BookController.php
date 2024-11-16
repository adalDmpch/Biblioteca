<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $libros = DB::table('libros')
                    ->orderBy('titulo')
                    ->get();

        return view('books.index', compact('libros'));
    }

    public function show($id)
    {
        $libro = DB::table('libros')
                   ->where('id', $id)
                   ->first();

        if (!$libro) {
            return redirect()->route('books')
                           ->with('error', 'Libro no encontrado');
        }

        return view('books.show', compact('libro'));
    }

    public function download($id)
    {
        $libro = DB::table('libros')
                   ->where('id', $id)
                   ->first();

        if (!$libro || !$libro->enlace_libro) {
            return back()->with('error', 'El libro no está disponible para descarga.');
        }   
        return redirect($libro->enlace_libro);
    }
}