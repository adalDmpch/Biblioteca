<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $totalLibros = DB::table('libros')->count();
        $totalUsuarios = DB::table('usuarios')
                          ->where('rol_id', 2)
                          ->count();

        return view('admin.dashboard', [
            'totalLibros' => $totalLibros,
            'totalUsuarios' => $totalUsuarios
        ]);
    }
}