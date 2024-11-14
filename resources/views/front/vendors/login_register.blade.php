{{-- Esta página se accede desde la pestaña de inicio de sesión de proveedor en el menú desplegable en el encabezado (en front/layout/header.blade.php) --}}
@extends('front.layout.layout')

@section('content')
    <!-- Contenedor de Introducción de Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cuenta</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Cuenta</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contenedor de Introducción de Página /- -->
    <!-- Página de Cuenta -->
    <div class="page-account u-s-p-t-80">
        <div class="container">

            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}} 
            {{-- Determinando Si Un Elemento Existe En La Sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}} 
            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}} 
            {{-- Mostrando Mensaje de Éxito --}} 
            @if (Session::has('success_message')) <!-- Ver método vendorRegister() en Front/VendorController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Mostrando Mensajes de Error --}} 
            @if (Session::has('error_message')) <!-- Ver método vendorRegister() en Front/VendorController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Mostrando Mensajes de Error --}} 
            @if ($errors->any()) <!-- Ver método vendorRegister() en Front/VendorController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <!-- Inicio de Sesión -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Inicio de Sesión</h2>
                        <h6 class="account-h6 u-s-m-b-30">¡Bienvenido de nuevo! Inicie sesión en su cuenta.</h6>

                        <form action="{{ url('admin/login') }}" method="post"> {{-- el mismo formulario HTML que el del panel de administración en admin/login.blade.php --}}
                            @csrf {{-- https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                            <div class="u-s-m-b-30">
                                <label for="vendor-email">Correo Electrónico
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="vendor-email" class="text-field" placeholder="Correo Electrónico">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendor-password">Contraseña
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="vendor-password" class="text-field" placeholder="Contraseña">
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Inicio de Sesión /- -->
                <!-- Registro -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Registro</h2>
                        <h6 class="account-h6 u-s-m-b-30">Registrarse en este sitio le permite acceder a su estado de pedido e historial.</h6>

                        <form id="vendorForm" action="{{ url('/vendor/register') }}" method="post">
                            @csrf

                            <div class="u-s-m-b-30">
                                <label for="vendorname">Nombre
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorname" class="text-field" placeholder="Nombre del Proveedor" name="name">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendormobile">Móvil
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendormobile" class="text-field" placeholder="Móvil del Proveedor" name="mobile">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendoremail">Correo Electrónico
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="vendoremail" class="text-field" placeholder="Correo Electrónico del Proveedor" name="email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorpassword">Contraseña
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="vendorpassword" class="text-field" placeholder="Contraseña del Proveedor" name="password">
                            </div>

                            <div class="u-s-m-b-30"> {{-- Checkbox "He leído y acepto los términos y condiciones" --}}
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">He leído y acepto los
                                    <a href="terms-and-conditions.html" class="u-c-brand">términos y condiciones</a>
                                </label>
                            </div>

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Registro /- -->
            </div>
        </div>
    </div>
    <!-- Página de Cuenta /- -->
@endsection
