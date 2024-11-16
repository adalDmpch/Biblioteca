@extends('layouts.header')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <h1 class="display-4 text-muted mb-4">Sin conexión a Internet, por favor intenta de nuevo mas tarde</h1>
        <p class="lead">Parece que no tienes conexión a internet.</p>
        <img src="{{ asset('images/offline.svg') }}" alt="Offline" class="img-fluid mb-4" style="max-width: 300px;">
        <div>
            <button onclick="window.location.reload()" class="btn btn-primary">
                <i class="fas fa-sync-alt mr-2"></i>Intentar de nuevo
            </button>
        </div>
    </div>
</div>

<script>
    window.addEventListener('online', function() {
        window.location.reload();
    });
</script>
@endsection