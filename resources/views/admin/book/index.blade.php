@extends('layouts.header')

@section('title', 'Administrar Libros')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Administrar Libros</h2>
        <a href="{{ route('admin.books.create') }}" class="btn btn-success">
            <i class="fas fa-plus mr-2"></i>Agregar Nuevo Libro
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Categoría</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libros as $libro)
                            <tr>
                                <td>{{ $libro->id }}</td>
                                <td>
                                    <img src="{{ asset('images/books/' . $libro->imagen_portada) }}" 
                                         alt="{{ $libro->titulo }}"
                                         class="img-thumbnail"
                                         style="height: 50px;">
                                </td>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->categoria }}</td>
                                <td>{{ \Carbon\Carbon::parse($libro->fecha_agregado)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.books.edit', $libro->id) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.books.destroy', $libro->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de querer eliminar este libro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .table td, .table th {
        vertical-align: middle;
    }
    
    .btn-group .btn {
        margin: 0 2px;
    }
    
    .img-thumbnail {
        object-fit: cover;
    }
</style>
@endpush
@endsection