@extends('layouts.header')

@section('title', 'Agregar Libro - Panel Admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Agregar Nuevo Libro</h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="titulo">Título del Libro</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                                   id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                            @error('titulo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control @error('autor') is-invalid @enderror" 
                                   id="autor" name="autor" value="{{ old('autor') }}" required>
                            @error('autor')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select class="form-control @error('categoria') is-invalid @enderror" 
                                    id="categoria" name="categoria" required>
                                <option value="">Selecciona una categoría</option>
                                <option value="Ficción">Ficción</option>
                                <option value="No Ficción">No Ficción</option>
                                <option value="Ciencia Ficción">Ciencia Ficción</option>
                                <option value="Fantasía">Fantasía</option>
                                <option value="Romance">Romance</option>
                                <option value="Misterio">Misterio</option>
                                <option value="Aventura">Aventura</option>
                            </select>
                            @error('categoria')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="enlace_libro">Enlace del Libro</label>
                            <input type="url" class="form-control @error('enlace_libro') is-invalid @enderror" 
                                   id="enlace_libro" name="enlace_libro" value="{{ old('enlace_libro') }}" required>
                            @error('enlace_libro')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen_portada">Imagen de Portada</label>
                            <input type="file" class="form-control-file @error('imagen_portada') is-invalid @enderror" 
                                   id="imagen_portada" name="imagen_portada" accept="image/*" required>
                            @error('imagen_portada')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Guardar Libro
                            </button>
                            <a href="{{ route('admin.books.index') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-arrow-left mr-2"></i>Volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.invalid-feedback {
    display: block;
}
</style>
@endpush