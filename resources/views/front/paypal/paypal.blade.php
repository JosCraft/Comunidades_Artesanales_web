{{-- Esta página es renderizada por el método paypal() dentro de Front/PaypalController.php --}}
@extends('front.layout.layout')


@section('content')
    <!-- Contenedor de Introducción de Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Carrito</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Proceder al Pago</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contenedor de Introducción de Página /- -->
    <!-- Página del Carrito -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>POR FAVOR REALICE EL PAGO POR SU PEDIDO</h3>
                    <form action="{{ route('payment') }}" method="post"> {{-- Esta es una Ruta Nombrada. Ver web.php --}} {{-- Generando URLs a Rutas Nombradas: https://laravel.com/docs/9.x/routing#generating-urls-to-named-routes --}}
                        @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                        <input type="hidden" name="amount" value="{{ round(Session::get('grand_total') / 80, 2) }}"> {{-- 'grand_total' fue almacenado en la Sesión en el método checkout() en Front/ProductsController.php --}} {{-- Interactuando con la Sesión: Recuperando Datos: https://laravel.com/docs/9.x/session#retrieving-data --}} {{-- Nota: PayPal acepta SOLO las principales divisas del mundo, por lo que dividimos INR por 80 para convertir INR a USD --}}
                      
                        <img src="{{ asset('front/images/qr/Qr.jpeg')}}" alt="QR">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Página del Carrito /- -->
@endsection
