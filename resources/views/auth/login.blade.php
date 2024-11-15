<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" >
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">

    @include('layouts.header')
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="alert-container">
                        @if(session('status'))
                            <div class="alert alert-{{ session('status')['type'] }}">
                                {{ session('status')['message'] }}
                            </div>
                        @endif
                    </div>

                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Inicio de sesión</h3>
                    </div>

                    <div class="panel-body p-3">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" title="Ingrese un correo válido" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-inline">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember" class="text-muted">Recordar contraseña</label>
                                <a href="{{ route('password.request') }}" id="forgot" class="font-weight-bold">¿Recuperar contraseña?</a>
                            </div>
                            <button class="btn btn-primary btn-block mt-3" type="submit">Ingresar</button>
                            <div class="text-center pt-4 text-muted">
                                ¿No tienes cuenta? <a href="{{ route('register') }}">Crea una cuenta</a>
                            </div>
                        </form>
                    </div>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
