<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <title>Registro</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Registrarse</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="{{ route('register') }}" method="POST" ">
                            @csrf
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" id="name" name="name" placeholder="Ingresa tu nombre completo" maxlength="50" pattern="[a-zA-Z ]+" autocomplete="off" required class="form-control">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="fa fa-user-circle p-2"></span>
                                    <input type="text" id="username" name="username" placeholder="Ingresa tu nombre de usuario" maxlength="15" pattern="[a-zA-Z0-9]+" autocomplete="off" required class="form-control">
                                </div>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="fa fa-phone-square p-2"></span>
                                    <input type="tel" id="number" name="number" placeholder="Ingresa tu número de teléfono" minlength="10" maxlength="10" pattern="[0-9]{10}" autocomplete="off" required class="form-control">
                                </div>
                                @error('number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="fa fa-address-book p-2"></span>
                                    <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" autocomplete="off" required class="form-control">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" minlength="6" maxlength="15" autocomplete="off" required class="form-control">
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
                                <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt="" width="40">
                            </a>
                            <a href="https://www.google.com" target="_blank" class="px-2">
                                <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt="" width="40">
                            </a>
                            <a href="https://www.github.com" target="_blank" class="px-2">
                                <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt="" width="40">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/validationone.js') }}"></script>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>
