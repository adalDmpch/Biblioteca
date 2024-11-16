<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesarrolladoresController extends Controller
{
    public function index()
    {
      return view('desarrolladores');
    }
}
