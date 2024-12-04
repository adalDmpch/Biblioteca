@extends('layouts.header')
@section('content')

<div class="container-fluid py-5">
    <div id="offline-alert" style="display: none;" class="alert alert-warning text-center mb-4" role="alert">
        <i class="fas fa-wifi-slash me-2"></i>
        <strong>Modo Offline</strong> - Mostrando los últimos libros guardados localmente
    </div>

    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Biblioteca</h6>
            <h1>Colección de Libros Guardados</h1>
        </div>

        <div class="row" id="libros-container">
            <!-- Los libros se agregarán aquí dinámicamente -->
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const librosContainer = document.getElementById('libros-container');
    const offlineAlert = document.getElementById('offline-alert');
    
    // Guardamos la ruta de la vista de libros
    const rutaLibros = "{{ route('books') }}"; // Asegúrate de tener definida esta ruta en Laravel

    // Función para crear una tarjeta de libro
    function crearTarjetaLibro(libro) {
        return `
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img class="card-img-top" 
                             src="/images/books/default.jpg"
                             alt="${libro.titulo}" 
                             style="height: 300px; object-fit: cover;">
                        <div class="category-badge position-absolute top-0 end-0 m-2">
                            <span class="badge bg-primary">${libro.categoria}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${libro.titulo}</h5>
                        <p class="card-text text-muted mb-2">
                            <i class="fas fa-user-edit mr-2"></i>${libro.autor}
                        </p>
                        <p class="card-text">${libro.descripcion || 'Sin descripción disponible'}</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">
                                <i class="fas fa-clock mr-1"></i>
                                Guardado: ${new Date(libro.fecha_guardado).toLocaleDateString()}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Función para manejar la redirección cuando vuelve el internet
    function manejarReconexion() {
        // Mostramos un mensaje de reconexión
        const reconexionAlert = document.createElement('div');
        reconexionAlert.className = 'alert alert-success text-center fixed-top m-3';
        reconexionAlert.innerHTML = `
            <i class="fas fa-wifi me-2"></i>
            <strong>Conexión Restaurada</strong> - Redirigiendo a la biblioteca...
        `;
        document.body.appendChild(reconexionAlert);

        // Esperamos 2 segundos antes de redirigir para que el usuario vea el mensaje
        setTimeout(() => {
            window.location.href = rutaLibros;
        }, 2000);
    }

    function mostrarLibros() {
        if (!navigator.onLine) {
            offlineAlert.style.display = 'block';
            
            try {
                const librosGuardados = JSON.parse(localStorage.getItem('libros') || '[]');
                
                if (librosGuardados && librosGuardados.length > 0) {
                    librosContainer.innerHTML = '';
                    
                    librosGuardados.forEach(libro => {
                        librosContainer.innerHTML += crearTarjetaLibro(libro);
                    });
                } else {
                    librosContainer.innerHTML = `
                        <div class="col-12 text-center">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                No hay libros guardados en el almacenamiento local.
                            </div>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Error al cargar los libros:', error);
                librosContainer.innerHTML = `
                    <div class="col-12 text-center">
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Error al cargar los libros guardados.
                        </div>
                    </div>
                `;
            }
        }
    }

    // Verificamos el estado inicial
    if (!navigator.onLine) {
        mostrarLibros();
    }

    // Event listeners para cambios en la conectividad
    window.addEventListener('online', function() {
        offlineAlert.style.display = 'none';
        manejarReconexion();
    });

    window.addEventListener('offline', function() {
        mostrarLibros();
    });
});
</script>

<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
.offline-indicator {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
}
</style>
@endsection