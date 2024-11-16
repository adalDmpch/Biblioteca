<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $libros = DB::table('libros')
                    ->orderBy('fecha_agregado', 'desc')
                    ->get();
        return view('admin.book.index', compact('libros'));
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:200',
            'autor' => 'required|max:100',
            'descripcion' => 'required',
            'categoria' => 'required|max:50',
            'enlace_libro' => 'required|url|max:500',
            'imagen_portada' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            if ($request->hasFile('imagen_portada')) {
                $imagen = $request->file('imagen_portada');
                $nombreImagen = time() . '_' . Str::slug($request->titulo) . '.' . $imagen->getClientOriginalExtension();
                $imagen->move(public_path('images/books'), $nombreImagen);
            }

            DB::table('libros')->insert([
                'titulo' => $request->titulo,
                'autor' => $request->autor,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'enlace_libro' => $request->enlace_libro,
                'imagen_portada' => $nombreImagen ?? null,
                'fecha_agregado' => now()
            ]);

            return redirect()->route('admin.books.index')
                           ->with('success', 'Libro agregado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al agregar el libro: ' . $e->getMessage())
                        ->withInput();
        }
    }

    public function edit($id)
    {
        $libro = DB::table('libros')->find($id);
        return view('admin.book.edit', compact('libro'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:200',
            'autor' => 'required|max:100',
            'descripcion' => 'required',
            'categoria' => 'required|max:50',
            'enlace_libro' => 'required|url|max:500',
            'imagen_portada' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $data = [
                'titulo' => $request->titulo,
                'autor' => $request->autor,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'enlace_libro' => $request->enlace_libro
            ];

            if ($request->hasFile('imagen_portada')) {
                $imagen = $request->file('imagen_portada');
                $nombreImagen = time() . '_' . Str::slug($request->titulo) . '.' . $imagen->getClientOriginalExtension();
                $imagen->move(public_path('images/books'), $nombreImagen);
                $data['imagen_portada'] = $nombreImagen;
            }

            DB::table('libros')->where('id', $id)->update($data);

            return redirect()->route('admin.books.index')
                           ->with('success', 'Libro actualizado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar el libro: ' . $e->getMessage())
                        ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('libros')->delete($id);
            return redirect()->route('admin.books.index')
                           ->with('success', 'Libro eliminado exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar el libro');
        }
    }
}