@extends('layouts.header')  

@section('title', 'Editar Libro')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Editar Libro</h5>
                </div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('admin.books.update', $libro->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="titulo">Título del Libro</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                   id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}" required>
                            @error('titulo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control @error('autor') is-invalid @enderror"
                                   id="autor" name="autor" value="{{ old('autor', $libro->autor) }}" required>
                            @error('autor')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select class="form-control @error('categoria') is-invalid @enderror" 
                                    id="categoria" name="categoria" required>
                                <option value="">Selecciona una categoría</option>
                                <option value="Ficción" {{ (old('categoria', $libro->categoria) == 'Ficción') ? 'selected' : '' }}>Ficción</option>
                                <option value="No Ficción" {{ (old('categoria', $libro->categoria) == 'No Ficción') ? 'selected' : '' }}>No Ficción</option>
                                <option value="Ciencia Ficción" {{ (old('categoria', $libro->categoria) == 'Ciencia Ficción') ? 'selected' : '' }}>Ciencia Ficción</option>
                                <option value="Fantasía" {{ (old('categoria', $libro->categoria) == 'Fantasía') ? 'selected' : '' }}>Fantasía</option>
                                <option value="Romance" {{ (old('categoria', $libro->categoria) == 'Romance') ? 'selected' : '' }}>Romance</option>
                                <option value="Misterio" {{ (old('categoria', $libro->categoria) == 'Misterio') ? 'selected' : '' }}>Misterio</option>
                            </select>
                            @error('categoria')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $libro->descripcion) }}</textarea>
                            @error('descripcion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="enlace_libro">Enlace del Libro</label>
                            <input type="url" class="form-control @error('enlace_libro') is-invalid @enderror"
                                   id="enlace_libro" name="enlace_libro" value="{{ old('enlace_libro', $libro->enlace_libro) }}" required>
                            @error('enlace_libro')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Imagen Actual</label><br>
                            <img src="{{ asset('images/books/' . $libro->imagen_portada) }}" 
                                 alt="Imagen actual" 
                                 class="img-thumbnail mb-2" 
                                 style="height: 100px;">
                        </div>

                        <div class="form-group">
                            <label for="imagen_portada">Nueva Imagen de Portada (opcional)</label>
                            <input type="file" class="form-control-file @error('imagen_portada') is-invalid @enderror"
                                   id="imagen_portada" name="imagen_portada" accept="image/*">
                            @error('imagen_portada')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="form-text text-muted">
                                Deja este campo vacío si no quieres cambiar la imagen actual.
                            </small>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Guardar Cambios
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

@push('styles')
<style>
.invalid-feedback {
    display: block;
}
.img-thumbnail {
    object-fit: cover;
}
</style>
@endpush

@push('scripts')
<script>
document.getElementById('imagen_portada').addEventListener('change', function(e) {
    if (e.target.files && e.target.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.img-thumbnail').src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
});
</script>
@endpush
@endsection