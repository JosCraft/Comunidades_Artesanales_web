{{-- Esta página es renderizada por el método error() dentro de Front/PaypalController.php (si la orden de pago por PayPal falla) --}}
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
                        <a href="#">¡Pago Fallido!</a>
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
                    <h3>¡Su pago ha fallado!</h3>
                    <p>Por favor, inténtelo de nuevo más tarde y contáctenos si tiene alguna consulta.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Página del Carrito /- -->
@endsection



{{-- Olvidar/eliminar algunos datos de la sesión después de realizar el pago por PayPal --}}
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('order_id');     // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponCode');   // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponAmount'); // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
@endphp
