@extends('layouts.header')

@section('title', 'Libros - Jaydey')

@section('content')
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Biblioteca</h6>
            <h1>Explora Nuestra Colección de Libros</h1>
        </div>
        
        {{-- Agregamos funcionalidad de búsqueda y filtrado --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar libros...">
            </div>
            <div class="col-md-6">
                <select id="categoryFilter" class="form-control">
                    <option value="">Todas las categorías</option>
                    @foreach($libros->pluck('categoria')->unique() as $categoria)
                        <option value="{{ $categoria }}">{{ $categoria }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row" id="libros-container">
            @foreach($libros as $libro)
                <div class="col-lg-4 col-md-6 mb-4 libro-card" 
                     data-titulo="{{ strtolower($libro->titulo) }}"
                     data-categoria="{{ strtolower($libro->categoria) }}">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img class="card-img-top" 
                                 src="{{ asset('images/books/' . ($libro->imagen_portada ?? 'default.jpg')) }}" 
                                 alt="{{ $libro->titulo }}" 
                                 style="height: 300px; object-fit: cover;"
                                 onerror="this.src='{{ asset('images/books/default.jpg') }}'">
                            <div class="category-badge position-absolute top-0 end-0 m-2">
                                <span class="badge bg-primary">{{ $libro->categoria }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $libro->titulo }}</h5>
                            <p class="card-text text-muted mb-2">
                                <i class="fas fa-user-edit mr-2"></i>{{ $libro->autor }}
                            </p>
                            <p class="card-text">{{ Str::limit($libro->descripcion, 150) }}</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('books.show', $libro->id) }}" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-info-circle mr-2"></i>Ver Detalles
                                </a>
                                <a href="{{ $libro->enlace_libro }}" 
                                   class="btn btn-success btn-sm" 
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
/* Animaciones suaves para las tarjetas */
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.card-img-top {
    background-color: #f8f9fa;
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
}
.category-badge {
    z-index: 2;
}
.btn {
    transition: all 0.3s ease;
}
.btn:hover {
    transform: translateY(-2px);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const libroCards = document.querySelectorAll('.libro-card');

    function guardarLibros() {
        const libros = @json($libros);
        const librosGuardados = JSON.parse(localStorage.getItem('libros') || '[]');

        const librosUnicos = [...librosGuardados];
        
        libros.forEach(libroNuevo => {
            const libroExiste = librosUnicos.some(libro => libro.id === libroNuevo.id);
            
            if (!libroExiste) {
                librosUnicos.push({
                    id: libroNuevo.id,
                    titulo: libroNuevo.titulo,
                    autor: libroNuevo.autor,
                    categoria: libroNuevo.categoria,
                    descripcion: libroNuevo.descripcion,
                    fecha_guardado: new Date().toISOString()
                });
            }
        });
        try {
            localStorage.setItem('libros', JSON.stringify(librosUnicos));
            console.log('Libros guardados exitosamente', librosGuardados);
        } catch (error) {
            console.error('Error al guardar los libros:', error);
            
            if (error.name === 'QuotaExceededError') {
                const librosLimitados = librosUnicos.slice(-50); 
                localStorage.setItem('libros', JSON.stringify(librosLimitados));
            }
        }
    }

    function recuperarLibrosGuardados() {
        try {
            const librosGuardados = JSON.parse(localStorage.getItem('libros') || '[]');
            console.log('Libros recuperados:', librosGuardados.length);
            return librosGuardados;
        } catch (error) {
            console.error('Error al recuperar los libros:', error);
            return [];
        }
    }

    function filterBooks() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();

        libroCards.forEach(card => {
            const titulo = card.dataset.titulo;
            const categoria = card.dataset.categoria;
            
            const matchesSearch = titulo.includes(searchTerm);
            const matchesCategory = !selectedCategory || categoria === selectedCategory;

            card.style.display = matchesSearch && matchesCategory ? 'block' : 'none';
        });
    }

    searchInput.addEventListener('input', filterBooks);
    categoryFilter.addEventListener('change', filterBooks);
    guardarLibros();

    const librosGuardados = recuperarLibrosGuardados();
    console.log(`Tienes ${librosGuardados.length} libros guardados localmente`);
});
</script>
@endpush