@extends('layouts.app')

@section('title', 'Libros - Jaydey')

@section('content')
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Biblioteca</h6>
            <h1>Explora Nuestra Colección de Libros</h1>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            @foreach($libros as $libro)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img class="card-img-top" src="{{ asset('images/' . $libro->imagen_portada) }}" 
                             alt="{{ $libro->titulo }}" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $libro->titulo }}</h5>
                            <p class="card-text text-muted mb-2">
                                <i class="fas fa-user-edit mr-2"></i>{{ $libro->autor }}
                            </p>
                            <p class="card-text text-muted mb-2">
                                <i class="fas fa-bookmark mr-2"></i>{{ $libro->categoria }}
                            </p>
                            <p class="card-text">{{ Str::limit($libro->descripcion, 150) }}</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('books.show', $libro->id) }}" 
                                   class="btn btn-primary">
                                    <i class="fas fa-info-circle mr-2"></i>Ver Detalles
                                </a>
                                <a href="{{ $libro->enlace_libro }}" 
                                   class="btn btn-success" 
                                   target="_blank">
                                    <i class="fas fa-download mr-2"></i>Descargar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.card {
    transition: transform 0.3s ease;
}
.card:hover {
    transform: translateY(-5px);
}
</style>
@endpush