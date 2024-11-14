{{-- Esta página es renderizada por el método thanks() dentro de Front/ProductsController.php --}}
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
                    <h3>SU PEDIDO HA SIDO REALIZADO CON ÉXITO</h3>
                    <p>Su número de pedido es {{ Session::get('order_id') }} y el total en Bs {{ Session::get('grand_total') }}</p> {{-- El número de pedido es el `id` del pedido en la tabla `orders` de la base de datos. Almacenamos el id del pedido en la sesión en el método checkout() en Front/ProductsController.php --}} {{-- Recuperación de Datos: https://laravel.com/docs/10.x/session#retrieving-data --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Página del Carrito /- -->
@endsection

{{-- Olvidar/Eliminar algunos datos en la sesión después de hacer/realizar el pedido --}}
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('order_id');     // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponCode');   // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponAmount'); // Eliminando Datos: https://laravel.com/docs/9.x/session#deleting-data
@endphp
