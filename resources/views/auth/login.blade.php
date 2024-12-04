
    @yield('head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" >
    @include('layouts.header')
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

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Inicio de sesión</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="email" 
                                           id="email" 
                                           name="email" 
                                           placeholder="Ingresa tu correo electrónico" 
                                           value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror"
                                           title="Ingrese un correo válido" 
                                           required>
                                </div>
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field">
                                    <span class="fas fa-lock px-2"></span>
                                    <input type="password" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Ingresa tu contraseña" 
                                           class="form-control @error('password') is-invalid @enderror"
                                           required>
                                    <button type="button" class="btn bg-white text-muted" onclick="togglePassword()">
                                        <span class="far fa-eye-slash"></span>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-inline">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="text-muted">Recordar contraseña</label>
                                <a class="text-decoration-none text-success ml-auto" 
                                   href="/" 
                                   id="forgot">¿Recuperar contraseña?</a>
                            </div>
                            <button class="btn btn-success btn-block mt-3" type="submit">Ingresar</button>
                            <div class="text-center text-success pt-4 text-muted">
                                ¿No tienes cuenta? 
                                <a class="text-decoration-none text-success" 
                                   href="{{ route('register') }}">Crea una cuenta</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const icon = document.querySelector('.far');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
    </script>
</body>
</html>