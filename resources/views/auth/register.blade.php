<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <title>Registro - Jaydey</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Registrarse</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" id="name" name="name" 
                                           placeholder="Ingresa tu nombre completo" 
                                           value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror" 
                                           maxlength="100" pattern="[a-zA-Z ]+" required>
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="fa fa-user-circle p-2"></span>
                                    <input type="text" id="username" name="username" 
                                           placeholder="Ingresa tu nombre de usuario" 
                                           value="{{ old('username') }}"
                                           class="form-control @error('username') is-invalid @enderror" 
                                           maxlength="15" pattern="[a-zA-Z0-9]+" required>
                                </div>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="fa fa-phone-square p-2"></span>
                                    <input type="tel" id="number" name="number" 
                                           placeholder="Ingresa tu número de teléfono" 
                                           value="{{ old('number') }}"
                                           class="form-control @error('number') is-invalid @enderror" 
                                           minlength="10" maxlength="10" pattern="[0-9]{10}" required>
                                </div>
                                @error('number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="fa fa-envelope p-2"></span>
                                    <input type="email" id="email" name="email" 
                                           placeholder="Ingresa tu correo electrónico" 
                                           value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror" required>
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" id="password" name="password" 
                                           placeholder="Ingresa tu contraseña" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           minlength="6" maxlength="15" required>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary btn-block mt-3" type="submit">Registrar</button>
                            <div class="text-center pt-4 text-muted">
                                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
                            </div>
                        </form>
                    </div>

                    <div class="mx-3 my-2 py-2 bordert">
                        <div class="text-center py-3">
                            <a href="https://www.facebook.com" target="_blank" class="px-2">
                                <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt="Facebook" width="40">
                            </a>
                            <a href="https://www.google.com" target="_blank" class="px-2">
                                <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt="Google" width="40">
                            </a>
                            <a href="https://www.github.com" target="_blank" class="px-2">
                                <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt="GitHub" width="40">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>