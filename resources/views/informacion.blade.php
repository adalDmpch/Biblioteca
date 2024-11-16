<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jaydey</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/home.css">

    @yield('head')
    @include('layouts.header')

</head>
    <style>
        .team-member {
            transition: transform 0.3s ease;
        }
        
        .team-member:hover {
            transform: translateY(-10px);
        }

        .member-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 3px solid #28a745;
        }

        .social-icons a {
            color: #28a745;
            margin: 0 10px;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #1e7e34;
        }

        .feature-icon {
            width: 100px;
            height: 100px;
            background-color: #28a745;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
        }

        .feature-icon i {
            font-size: 40px;
            color: white;
        }
    </style>
    @yield('head')
    @include('layouts.header')
</head>

<body>

    <!-- Hero Section Start -->
    <div class="container-fluid bg-white py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-success text-uppercase" style="letter-spacing: 5px;">NUESTRO EQUIPO</h6>
                <h1>Los Creadores de Jaydey</h1>
                <p class="text-muted mt-3">Conoce al equipo apasionado detrás de Jaydey, dedicados a crear la mejor experiencia de lectura digital para nuestra comunidad.</p>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Team Members Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="row">
                @php
                    $teamMembers = [
                        [
                            'name' => 'Yareni Yuritza Ramos Santiagos',
                            'role' => 'Líder del Proyecto',
                            'description' => 'Especialista en desarrollo web con más  experiencia en aplicaciones literarias.',
                            'image' => 'img/yareni.jpg'
                        ],
                        [
                            'name' => 'Adal Mendez Jimenez',
                            'role' => 'Diseñador UI/UX',
                            'description' => 'Apasionada por crear experiencias de usuario intuitivas y atractivas para los amantes de la lectura.',
                            'image' => 'img/adal.jpg'
                        ],
                        [
                            'name' => 'Daniel de Jesus Lopez Perez',
                            'role' => 'Desarrollador Full Stack',
                            'description' => 'Experto en tecnologías web modernas y optimización de bases de datos literarias.',
                            'image' => 'img/daniel.jpg'
                        ],
                        [
                            'name' => 'Jenner Alexander Gomez Hernandez',
                            'role' => 'Diseñador en Back End',
                            'description' => 'Experto en tecnologías web modernas, integración de APIs, optimización de bases de datos y desarrollo de sistemas escalables y seguros.',
                            'image' => 'img/jenner.jpg'
                        ],
                        [
                            'name' => 'Erika Isabel Arcos Gomez',
                            'role' => 'Analista de datos',
                            'description' => 'Experto en herramientas de visualización, modelado estadístico y optimización de procesos basados en datos.',
                            'image' => 'img/erika.jpg'
                        ]
                        
                    ];
                @endphp

                @foreach($teamMembers as $member)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-member bg-white rounded shadow-sm p-4 text-center">
                        <img class="member-image" src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}">
                        <h4 class="font-weight-bold">{{ $member['name'] }}</h4>
                        <p class="text-success mb-3">{{ $member['role'] }}</p>
                        <p class="text-muted">{{ $member['description'] }}</p>
                        <div class="social-icons mt-3">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team Members End -->

    <!-- Features Start -->
    <div class="container-fluid bg-white py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h4>Colaboración</h4>
                            <p class="text-muted">Trabajamos juntos para crear la mejor experiencia de lectura digital.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div>
                            <h4>Pasión</h4>
                            <p class="text-muted">Amamos los libros y queremos compartir esa pasión contigo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="d-flex">
                        <div class="feature-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div>
                            <h4>Dedicación</h4>
                            <p class="text-muted">Comprometidos con la excelencia en cada detalle.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    @include('layouts.footer')

    <!-- Destination Start -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="//js/animaciones.js"></script>
    <script>
        var aboutImage = document.getElementById('aboutImage');
        var aboutText = document.getElementById('aboutText');


        window.addEventListener('scroll', function () {
            var scale = 1 + (window.scrollY / 800);

            scale = Math.min(scale, 1.1);

            aboutImage.style.transform = 'scale(' + scale + ')';
            aboutText.style.transform = 'scale(' + scale + ')';
        });
            </script>
    <!-- Paquetes y otros componentes -->
</body>
</html>
