<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000000">
    <title>@yield('title', 'Jaydey')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    @laravelPWA
    @stack('styles')
</head>
<body>

    <div class="container-fluid position-fixed nav-bar p-0 fixed-top">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <h1 class="m-0 text-success"><span class="text-dark">JAYD</span>EY</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="fas fa-home mr-2"></i>Inicio
                        </a>

                        @auth
                            <a href="{{ route('books') }}" class="nav-item nav-link {{ request()->routeIs('books') ? 'active' : '' }}">
                                <i class="fas fa-book mr-2"></i>Libros
                            </a>
                        @endauth

                        <a href="{{ route('contacto') }}" class="nav-item nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}">
                            <i class="fas fa-envelope mr-2"></i>Contacto
                        </a>
                        
                        @guest
                            <a href="{{ route('login') }}" class="nav-item nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                                <i class="fas fa-sign-in-alt mr-2"></i>Inicio de Sesión
                            </a>
                        @else
                            @if(Auth::user()->rol_id == 1)
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-cogs mr-2"></i>Administración
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow-sm">
                                        <a href="{{ route('admin.books.index') }}" class="dropdown-item">
                                            <i class="fas fa-book mr-2"></i>Gestionar Libros
                                        </a>
                                        <a href="{{ route('admin.books.create') }}" class="dropdown-item">
                                            <i class="fas fa-plus mr-2"></i>Agregar Libro
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-user-circle mr-2"></i>{{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow-sm">
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </div>
    
    <div style="margin-top: 90px;"></div>

    <main>
        @yield('content')
    </main>

  <script>
            window.addEventListener('online', handleConnection);
        window.addEventListener('offline', handleConnection);

        function handleConnection() {
            if (navigator.onLine) {
                // 
            } else{
                location.replace('/offline');
            }
        }
  </script>
    @stack('scripts')
</body>
</html>