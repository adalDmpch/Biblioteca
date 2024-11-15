<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jaydey</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @yield('head')
</head>

<style>
    #aboutImage, #aboutText {
        transition: transform 0.3s ease;
    }
</style>

<body>

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="/static/img/home.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Jaydey</h4>
                            <h1 class="display-3 text-white mb-md-4">Los Sueños Escritos En Papel</h1>
                            <a id="miElemento" href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Disfruta de un buen libro</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="/static/img/home2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Jaydey</h4>
                            <h1 class="display-3 text-white mb-md-4">Una Película Nunca Superará a Su Libro</h1>
                            <a href="" id="miElemento" class="btn btn-primary py-md-3 px-md-5 mt-2">Lee y Disfruta</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img id="aboutImage" class="position-absolute w-100 h-100" src="/static/img/libro1.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div id="aboutText" class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Únete a Nosotros</h6>
                        <h1 class="mb-3">Leer es la mejor forma de Nutrir el alma</h1>
                        <p>Descubre un mundo de conocimiento y aventuras literarias. Regístrate ahora para explorar nuestra selección de los mejores libros que transformarán tu experiencia de lectura. ¡Sumérgete en historias inolvidables y expande tu horizonte con cada página!</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="/static/img/comple1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="/static/img/comple2.jpg" alt="">
                            </div>
                        </div>
                        <a href="{{ route('register') }}" class="btn btn-primary mt-1">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class="container-fluid">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Valor</h5>
                            <p class="m-0">El valor de un libro no se define con el peso de sus páginas, sino con la profundidad de las emociones.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Premio</h5>
                            <p class="m-0">Los mejores libros son aquellos que, aclamados por los fanáticos, trascienden el papel para convertirse en mundos vibrantes</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Mundo</h5>
                            <p class="m-0">El mundo de los libros es un universo infinito donde cada página es una puerta a la aventura, la sabiduría y la magia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Destination Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Categorías</h6>
                <h1>Explora tus categorías favoritas</h1>
            </div>
            <div class="row">
                <!-- Añadir más categorías aquí -->
            </div>
        </div>
    </div>
    <!-- Destination Start -->

</body>

</html>
