{{-- Esta página es renderizada por el método contact() dentro de Front/CmsController.php --}}
@extends('front.layout.layout')

@section('content')
    <!-- Contenedor de Introducción de la Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Contáctanos</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="contact.html">Contáctanos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contenedor de Introducción de la Página /- -->
    <!-- Página de Contacto -->
    <div class="page-contact u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="touch-wrapper">
                        <h1 class="contact-h1">Ponte en Contacto Con Nosotros</h1>

                        {{-- Mostrando Errores de Validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
                        {{-- Determinando si un Elemento Existe en la Sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        @if (Session::has('error_message')) <!-- Verificar el método updateAdminPassword() en AdminController.php -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- Mostrando Errores de Validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                @php
                                    echo implode('', $errors->all('<div>:message</div>'))
                                @endphp

                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}} 
                        {{-- Determinando si un Elemento Existe en la Sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
                        {{-- Mostrando Mensaje de Éxito --}}
                        @if (Session::has('success_message')) <!-- Verificar el método vendorRegister() en Front/VendorController.php -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ url('contact') }}" method="post">
                            @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                            <div class="group-inline u-s-m-b-30">
                                <div class="group-1 u-s-p-r-16">
                                    <label for="contact-name">Tu Nombre
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="contact-name" class="text-field" placeholder="Nombre" name="name" value="{{ old('name') }}"> {{-- Recuperando Entrada Anterior: https://laravel.com/docs/9.x/requests#retrieving-old-input --}}
                                </div>
                                <div class="group-2">
                                    <label for="contact-email">Tu Correo Electrónico
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="email" id="contact-email" class="text-field" placeholder="Correo Electrónico" name="email" value="{{ old('email') }}"> {{-- Recuperando Entrada Anterior: https://laravel.com/docs/9.x/requests#retrieving-old-input --}}
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="contact-subject">Asunto
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact-subject" class="text-field" placeholder="Asunto" name="subject" value="{{ old('subject') }}"> {{-- Recuperando Entrada Anterior: https://laravel.com/docs/9.x/requests#retrieving-old-input --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="contact-message">Mensaje:</label>
                                <span class="astk">*</span>
                                <textarea class="text-area" id="contact-message" name="message">{{ old('message') }}</textarea> {{-- Recuperando Entrada Anterior: https://laravel.com/docs/9.x/requests#retrieving-old-input --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <button type="submit" class="button button-outline-secondary">Enviar Mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="information-about-wrapper">
                        <h1 class="contact-h1">Información Sobre Nosotros</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, tempora, voluptate. Architecto aspernatur, culpa cupiditate deserunt dolore eos facere in, incidunt omnis quae quam quos, similique sunt tempore vel vero.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, tempora, voluptate. Architecto aspernatur, culpa cupiditate deserunt dolore eos facere in, incidunt omnis quae quam quos, similique sunt tempore vel vero.
                        </p>
                    </div>
                    <div class="contact-us-wrapper">
                        <h1 class="contact-h1">Contáctanos</h1>
                        <div class="contact-material u-s-m-b-16">
                            <h6>Ubicación</h6>
                            <span>10 Salah Salem St.</span>
                            <span>Cairo, Egipto</span>
                        </div>
                        <div class="contact-material u-s-m-b-16">
                            <h6>Correo Electrónico</h6>
                            <span>developers@computerscience.com</span>
                        </div>
                        <div class="contact-material u-s-m-b-16">
                            <h6>Teléfono</h6>
                            <span>+201122237359</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-s-p-t-80">
            <div id="map"></div>
        </div>
    </div>
    <!-- Página de Contacto /- -->
@endsection
