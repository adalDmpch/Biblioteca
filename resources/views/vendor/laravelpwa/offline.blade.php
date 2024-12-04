@extends('layouts.header')
@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <div class="error-offline mb-4">
            <i class="fas fa-wifi-slash fa-5x text-muted"></i>
        </div>
        <h1 class="display-4 mb-4">Sin conexión a Internet</h1>
        <p class="lead text-muted mb-4">No hay conexión a internet disponible en este momento.</p>
        <div class="offline-icon mb-4">
            <img src="{{ asset('images/icons/Jaydey-192X192.png') }}" alt="Jaydey Logo" class="img-fluid" style="max-width: 150px;">
        </div>
        <div class="offline-actions">
            <button onclick="window.location.reload()" class="btn btn-primary btn-lg">
                <i class="fas fa-sync-alt mr-2"></i>
                Intentar nuevamente
            </button>
        </div>
    </div>
</div>

<style>
    .error-offline {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
        100% {
            opacity: 1;
        }
    }

    .offline-actions {
        margin-top: 2rem;
    }

    .offline-icon img {
        filter: grayscale(0.5);
        transition: filter 0.3s ease;
    }

    .offline-icon img:hover {
        filter: grayscale(0);
    }
</style>

<script>
    window.addEventListener('online', function() {
        const lastPage = sessionStorage.getItem('lastPage');
        if (lastPage) {
            window.location.href = lastPage;
        } else {
            window.location.href = '/';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        if (navigator.onLine) {
            const lastPage = sessionStorage.getItem('lastPage');
            if (lastPage) {
                window.location.href = lastPage;
            }
        }
    });
</script>
@endsection