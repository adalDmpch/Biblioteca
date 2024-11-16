@extends('layouts.app')

@section('title', $libro->titulo . ' - Jaydey')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <img src="{{ asset('images/' . $libro->imagen_portada) }}" 
                 alt="{{ $libro->titulo }}" 
                 class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-lg-8">
            <h1 class="mb-4">{{ $libro->titulo }}</h1>
            <div class="mb-4">
                <p class="h5 text-muted">
                    <i class="fas fa-user-edit mr-2"></i>{{ $libro->autor }}
                </p>
                <p class="badge badge-primary">
                    <i class="fas fa-bookmark mr-2"></i>{{ $libro->categoria }}
                </p>
            </div>
            <div class="mb-4">
                <h5>Descripción</h5>
                <p class="text-muted">{{ $libro->descripcion }}</p>
            </div>
            <div>
                <a href="{{ $libro->enlace_libro }}" 
                   class="btn btn-success btn-lg" 
                   target="_blank">
                    <i class="fas fa-download mr-2"></i>Descargar Libro
                </a>
                <a href="{{ route('books') }}" 
                   class="btn btn-outline-primary btn-lg ml-3">
                    <i class="fas fa-arrow-left mr-2"></i>Volver a la Biblioteca
                </a>
            </div>
        </div>
    </div>
</div>
@endsection