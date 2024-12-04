@include('layouts.header')

<style>
    #aboutImage,
    #aboutText {
        transition: transform 0.3s ase;
    }
</style>
<body>

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="/img/home.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Jaydey</h4>
                            <h1 class="display-3 text-white mb-md-4">Los Sueños Escritos En Papel</h1>
                            <a id="miElemento" href="" class="btn btn-success py-md-3 px-md-5 mt-2">Disfruta de un buen libro</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="/img/home2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Jaydey</h4>
                            <h1 class="display-3 text-white mb-md-4">Una Pelicula Nunca Superara a Su Libro</h1>
                            <a href="" id="miElemento" class="btn btn-success py-md-3 px-md-5 mt-2">Lee y Difruta</a>
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
                    <img id="aboutImage" class="position-absolute w-100 h-100" src="/img/libro1.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div id="aboutText" class="about-text bg-white p-4 p-lg-5 my-lg-5">
                    <h6 class="text-success text-uppercase" style="letter-spacing: 5px;">Unete a Nosotros</h6>
                    <h1 class="mb-3">Leer es la mejor forma de Nutrir el alma</h1>
                    <p>Descubre un mundo de conocimiento y aventuras literarias. Regístrate ahora para explorar nuestra selección de los mejores libros que transformarán tu experiencia de lectura. ¡Sumérgete en historias inolvidables y expande tu horizonte con cada página!</p>
                    <div class="row mb-4">
                        <div class="col-6">
                            <img class="img-fluid" src="/img/comple1.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="/img/comple2.jpg" alt="">
                        </div>
                    </div>
                    <a href="/register" class="btn btn-success mt-1">Registrarse</a>
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
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-success mr-3" style="height: 100px; width: 100px;">
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
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-success mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Premio</h5>
                            <p class="m-0">Los mejores libros son aquellos que, aclamados por los fanáticos, trascienden el papel para convertirse en mundos vibrantes </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-success mr-3" style="height: 100px; width: 100px;">
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
                <h6 class="text-success text-uppercase" style="letter-spacing: 5px;">Categorias</h6>
                <h1>Explora tus categorias favoritas</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="/img/terror.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Terror</h5>
                            <span>En la oscuridad, el terror se despierta, susurra pesadillas y danza con las sombras de lo desconocido.</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="/img/misterio.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Misterio </h5>
                            <span>Entre las páginas, el misterio teje su hechizo, dejando en el aire la intriga que solo la verdad puede desvelar.</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="/img/romance.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Romance</h5>
                            <span>En el suave susurro de las palabras, el romance florece, pintando el lienzo de las emociones con pinceladas de amor eterno.</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="/img/fantacia.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Fantasia</h5>
                            <span>Donde las realidades se desdibujan, la fantasía despliega sus alas, llevándote a mundos donde los sueños se entrelazan con la realidad.</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="/img/drama.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Drama</h5>
                            <span>En el escenario de la vida, el drama se desenvuelve, tejiendo hilos de pasión, conflicto y redención en cada capítulo.</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="/img/accion.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Accion</h5>
                            <span>En cada página, la acción cobra vida, donde héroes desatan caos y la adrenalina se entreteje en la trama.</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->


    <!-- Packages Start -->
    <div class="container-fluid py-2">
        <div class="container pt-1">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-success text-uppercase" style="letter-spacing: 5px;">LIBROS</h6>
                <h1>LOS MEJORES LIBROS</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="/img/LIBRO01.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-user text-success mr-2"></i>29834 lectores</small>
                            </div>
                            <a class="h5 text-decoration-none text-dark" href="">El éxito solo se gana con la lectura</a>

                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-success mr-2"></i>4.5 <small>(2508)</small></h6>
                                    <h5 class="m-0">Gratis</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="/img/LIBRO02.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-user text-success mr-2"></i>10234 Lectores</small>
                            </div>
                            <a class="h5 text-decoration-none text-dark" href="">Las lagrimas son solo para personas debiles </a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-success mr-2"></i>4.5 <small>(3434)</small></h6>
                                    <h5 class="m-0">$350</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="/img/LIBRO4.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-user text-success mr-2"></i>23543 Lectores</small>
                            </div>
                            <a class="h5 text-decoration-none text-dark" href="">La respuesta se encuentra en un engranaje</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-success mr-2"></i>4.2 <small>(2503)</small></h6>
                                    <h5 class="m-0">Gratis</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="/img/LIBRO5.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-user text-success mr-2"></i>21543 Lectores</small>
                            </div>
                            <a class="h5 text-decoration-none text-dark" href="">Un niño tan blanco como la nieve</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-success mr-2"></i>4.9 <small>(2560)</small></h6>
                                    <h5 class="m-0">$350</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="/img/LIBRO6.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-user text-success mr-2"></i>34743 lectores</small>
                            </div>
                            <a class="h5 text-decoration-none text-dark" href="">El mundo que anelamos todos</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-success mr-2"></i>4.2 <small>(2504)</small></h6>
                                    <h5 class="m-0">$293</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="/img/LIBRO08.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-user text-success mr-2"></i>25675 Lectores</small>
                            </div>
                            <a class="h5 text-decoration-none text-dark" href="">El poder esta en todos, ser mas que un guerrrero</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-success mr-2"></i>4.1 <small>(2504)</small></h6>
                                    <h5 class="m-0">$Gratis</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
