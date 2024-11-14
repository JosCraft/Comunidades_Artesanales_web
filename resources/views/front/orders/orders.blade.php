{{-- resources/views/front/orders.blade.php --}}
@extends('front.layout.layout')

@section('content')
    <!-- Encabezado de la Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Mis Pedidos</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Pedidos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Encabezado de la Página /- -->
    <!-- Página de Pedidos -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <table class="table table-striped table-borderless">
                    <thead class="table-danger">
                        <tr>
                            <th>ID del Pedido</th>
                            <th>Productos Pedidos</th> {{-- Aquí mostraremos los códigos de los productos --}}
                            <th>Método de Pago</th>
                            <th>Total General</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th> {{-- Nueva columna para acciones --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <a href="{{ url('user/orders/' . $order['id']) }}">{{ $order['id'] }}</a>
                                </td>
                                <td>
                                    @foreach ($order['orders_products'] as $product)
                                        {{ $product['product_code'] }}
                                        <br>
                                    @endforeach
                                </td>
                                <td>{{ $order['payment_method'] }}</td>
                                <td>{{ $order['grand_total'] }}</td>
                                <td>{{ date('Y-m-d h:i:s', strtotime($order['created_at'])) }}</td>
                                <td>
<<<<<<< HEAD
=======
								
>>>>>>> 2d6b2f34a724724e2a0ff21a1a1fb205e357852e
                                    @php
                                        // Determinar el color del botón según el estado del pedido
                                        $buttonClass = 'btn-primary'; // Color por defecto
                                        if (isset($order['order_status'])) {
                                            switch ($order['order_status']) {
                                                case 'Entregado': 
                                                    $buttonClass = 'btn-success'; // Verde para entregado
                                                    break;
                                                case 'Cancelado': 
                                                    $buttonClass = 'btn-danger'; // Rojo para cancelado
                                                    break;
                                                // Puedes agregar más casos si es necesario
                                            }
                                        }
                                    @endphp
                                    <a href="{{ url('user/orders/' . $order['id']) }}" class="btn {{ $buttonClass }} btn-sm">
                                        ¿Por dónde está mi pedido?
                                    </a>
								
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Página de Pedidos /- -->
@endsection
