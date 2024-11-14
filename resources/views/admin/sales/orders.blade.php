{{-- Esta página es renderizada por el método orders() dentro de Admin/OrderController.php --}} 
@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pedidos</h4>
                            
                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="orders" class="table table-bordered"> {{-- usando el id aquí para el DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID del Pedido</th>
                                            <th>Fecha del Pedido</th>
                                            <th>Nombre del Cliente</th>
                                            <th>Email del Cliente</th>
                                            <th>Productos Pedidos</th>
                                            <th>Monto del Pedido</th>
                                            <th>Estado del Pedido</th>
                                            <th>Método de Pago</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // dd($orders); // verificar si el usuario autenticado es 'vendor' (mostrar SOLO los pedidos de productos pertenecientes a ellos) o 'admin' (mostrar TODOS los pedidos)
                                        @endphp
                                        @foreach ($orders as $order)
                                            @if ($order['orders_products']) {{-- Si el 'vendor' tiene productos pedidos (si un producto del 'vendor' ha sido pedido), mostrarlos. Ver cómo limitamos las cargas ansiosas utilizando una subconsulta en el método orders() dentro de Admin/OrderController.php dentro de la condición if --}}
                                                <tr>
                                                    <td>{{ $order['id'] }}</td>
                                                    <td>{{ date('Y-m-d h:i:s', strtotime($order['created_at'])) }}</td>
                                                    <td>{{ $order['name'] }}</td>
                                                    <td>{{ $order['email'] }}</td>
                                                    <td>
                                                        @foreach ($order['orders_products'] as $product)
                                                            {{ $product['product_code'] }} ({{ $product['product_qty'] }})
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $order['grand_total'] }}</td>
                                                    <td>{{ $order['order_status'] }}</td>
                                                    <td>{{ $order['payment_method'] }}</td>
                                                    <td>
                                                        <a title="Ver Detalles del Pedido" href="{{ url('admin/orders/' . $order['id']) }}">
                                                            <i style="font-size: 25px" class="mdi mdi-file-document"></i> {{-- Íconos del template de Skydash Admin Panel --}}
                                                        </a>
                                                        &nbsp;&nbsp;

                                                        {{-- Ver factura en HTML --}} 
                                                        <a title="Ver Factura del Pedido" href="{{ url('admin/orders/invoice/' . $order['id']) }}" target="_blank">
                                                            <i style="font-size: 25px" class="mdi mdi-printer"></i> {{-- Íconos del template de Skydash Admin Panel --}}
                                                        </a>
                                                        &nbsp;&nbsp;

                                                        {{-- Ver factura en PDF --}} 
                                                        <a title="Imprimir Factura en PDF" href="{{ url('admin/orders/invoice/pdf/' . $order['id']) }}" target="_blank">
                                                            <i style="font-size: 25px" class="mdi mdi-file-pdf"></i> {{-- Íconos del template de Skydash Admin Panel --}}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
