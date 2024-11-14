{{-- Esta página es renderizada por el método success() dentro de Front/PaypalController.php (si el pago de la orden por PayPal es exitoso) --}}
@extends('front.layout.layout')


@section('content')
    <!-- Contenedor de Introducción de Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Pago</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Gracias</a>
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
                    <h3 SU PAGO HA SIDO CONFIRMADO</h3>
                    <p>Gracias por el pago. Procesaremos su pedido muy pronto.</p>
                    <p>Su número de pedido es {{ Session::get('order_id') }} y el monto total pagado en Bs {{ Session::get('grand_total') }}</p> {{-- El número de pedido es el `id` de la orden en la tabla de base de datos `orders`. Almacenamos el id de la orden en la sesión en el método checkout() en Front/ProductsController.php --}} {{-- Recuperando Datos: https://laravel.com/docs/10.x/session#retrieving-data --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Página del Carrito /- -->
@endsection



{{-- Olvidar/Eliminar algunos datos en la sesión después de realizar el pago por PayPal --}} 
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('order_id');     // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponCode');   // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponAmount'); // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
@endphp
