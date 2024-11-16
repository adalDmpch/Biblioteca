<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Jaydey, Contacto, HTML Template">
    <meta name="description" content="Formulario de contacto para Jaydey">
    <title>Jaydey Contacto</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">

    
    @yield('head')
    @include('layouts.header')
</head>

<body>
    <!-- Encabezado -->
    <header class="container-fluid page-header">
        <div class="container text-center d-flex flex-column align-items-center justify-content-center" style="min-height: 400px;">
            <h3 class="display-4 text-white text-uppercase">Contáctanos</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="/">Inicio</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Contacto</p>
            </div>
        </div>
    </header>

    <!-- Sección de Contacto -->
    <section class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contáctanos</h6>
                <h1>Comparte tus aventuras con nosotros</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white p-4">
                        <form id="contactForm" action="/sesion/contactbook" method="POST" onsubmit="return validateForm()">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre" required>
                                    <small id="nameError" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="email" class="form-control" id="email" name="correo" placeholder="Correo" required>
                                    <small id="emailError" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="asunto" placeholder="Motivo" required>
                                <small id="subjectError" class="form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" name="mensaje" rows="5" placeholder="Mensaje" required></textarea>
                                <small id="messageError" class="form-text text-danger"></small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3 py-2 px-4">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="/static/js/validacioncon.js"></script> -->

    @include('layouts.footer')
</body>

</html>
