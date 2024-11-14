
{{-- This page is rendered by orderDetails() method inside Admin/OrderController.php --}}
@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">


            {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{-- <strong>Error:</strong> {{ Session::get('error_message') }} --}}

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}} 
            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
            {{-- Displaying Success Message --}}
            @if (Session::has('success_message')) <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="row">
                                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                        <h3 class="font-weight-bold">Detalles del Pedido</h3> <!-- Order Details -->
                                        <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/orders') }}">Volver a Pedidos</a></h6> <!-- Back to Orders -->
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <div class="justify-content-end d-flex">
                                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="mdi mdi-calendar"></i> Hoy (10 de enero de 2021) <!-- Today (10 Jan 2021) -->
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                                    <a class="dropdown-item" href="#">Enero - Marzo</a> <!-- January - March -->
                                                    <a class="dropdown-item" href="#">Marzo - Junio</a> <!-- March - June -->
                                                    <a class="dropdown-item" href="#">Junio - Agosto</a> <!-- June - August -->
                                                    <a class="dropdown-item" href="#">Agosto - Noviembre</a> <!-- August - November -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detalles del Pedido</h4> <!-- Order Details -->
                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">ID del Pedido: </label> <!-- Order ID: -->
                            <label>#{{ $orderDetails['id'] }}</label>
                        </div>
                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Fecha del Pedido: </label> <!-- Order Date: -->
                            <label>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</label>
                        </div>
                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Estado del Pedido: </label> <!-- Order Status: -->
                            <label>{{ $orderDetails['order_status'] }}</label>
                        </div>
                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Total del Pedido: </label> <!-- Order Total: -->
                            <label>Bs.{{ $orderDetails['grand_total'] }}</label>
                        </div>
                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Cargos de Envío: </label> <!-- Shipping Charges: -->
                            <label>Bs.{{ $orderDetails['shipping_charges'] }}</label>
                        </div>

                        @if (!empty($orderDetails['coupon_code']))
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Código de Cupón: </label> <!-- Coupon Code: -->
                                <label>{{ $orderDetails['coupon_code'] }}</label>
                            </div>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Monto del Cupón: </label> <!-- Coupon Amount: -->
                                <label>Bs.{{ $orderDetails['coupon_amount'] }}</label>
                            </div>
                        @endif

                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Método de Pago: </label> <!-- Payment Method: -->
                            <label>{{ $orderDetails['payment_method'] }}</label>
                        </div>
                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Pasarela de Pago: </label> <!-- Payment Gateway: -->
                            <label>{{ $orderDetails['payment_gateway'] }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detalles del Cliente</h4> <!-- Customer Details -->
                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Nombre: </label> <!-- Name: -->
                            <label>{{ $userDetails['name'] }}</label>
                        </div>

                        @if (!empty($userDetails['address']))
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Dirección: </label> <!-- Address: -->
                                <label>{{ $userDetails['address'] }}</label>
                            </div>
                        @endif

                        @if (!empty($userDetails['city']))
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Ciudad: </label> <!-- City: -->
                                <label>{{ $userDetails['city'] }}</label>
                            </div>
                        @endif

                        @if (!empty($userDetails['state']))
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Estado: </label> <!-- State: -->
                                <label>{{ $userDetails['state'] }}</label>
                            </div>
                        @endif
                        
                        @if (!empty($userDetails['country']))
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">País: </label> <!-- Country: -->
                                <label>{{ $userDetails['country'] }}</label>
                            </div>
                        @endif
                        
                        @if (!empty($userDetails['pincode']))
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Código Postal: </label> <!-- Pincode: -->
                                <label>{{ $userDetails['pincode'] }}</label>
                            </div>
                        @endif

                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Móvil: </label> <!-- Mobile: -->
                            <label>{{ $userDetails['mobile'] }}</label>
                        </div>
                        <div class="form-group" style="height: 15px">
                            <label style="font-weight: 550">Correo Electrónico: </label> <!-- Email: -->
                            <label>{{ $userDetails['email'] }}</label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Dirección de Entrega</h4>
            <div class="form-group" style="height: 15px">
                <label style="font-weight: 550">Nombre: </label>
                <label>{{ $orderDetails['name'] }}</label>
            </div>

            @if (!empty($orderDetails['address']))
                <div class="form-group" style="height: 15px">
                    <label style="font-weight: 550">Dirección: </label>
                    <label>{{ $orderDetails['address'] }}</label>
                </div>
            @endif

            @if (!empty($orderDetails['city']))
                <div class="form-group" style="height: 15px">
                    <label style="font-weight: 550">Ciudad: </label>
                    <label>{{ $orderDetails['city'] }}</label>
                </div>
            @endif

            @if (!empty($orderDetails['state']))
                <div class="form-group" style="height: 15px">
                    <label style="font-weight: 550">Estado: </label>
                    <label>{{ $orderDetails['state'] }}</label>
                </div>
            @endif
            
            @if (!empty($orderDetails['country']))
                <div class="form-group" style="height: 15px">
                    <label style="font-weight: 550">País: </label>
                    <label>{{ $orderDetails['country'] }}</label>
                </div>
            @endif
            
            @if (!empty($orderDetails['pincode']))
                <div class="form-group" style="height: 15px">
                    <label style="font-weight: 550">Código Postal: </label>
                    <label>{{ $orderDetails['pincode'] }}</label>
                </div>
            @endif

            <div class="form-group" style="height: 15px">
                <label style="font-weight: 550">Móvil: </label>
                <label>{{ $orderDetails['mobile'] }}</label>
            </div>
        </div>
    </div>
</div>



<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Actualizar Estado del Pedido</h4>  {{-- determinado solo por 'admin', no por 'vendedores' --}}

            {{-- Permitiendo la función general "Actualizar Estado del Pedido" solo para 'admin', y restringiéndola a 'vendedores' (los 'vendedores' solo pueden actualizar el estado de sus productos pedidos en la parte inferior de esta página) --}} 
            @if (Auth::guard('admin')->user()->type != 'vendor') {{-- Si el usuario autenticado/logueado es 'admin', permitir la función "Actualizar Estado del Pedido" --}} {{-- Accediendo a Instancias de Guardia Específicas: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}} {{-- Recuperando el Usuario Autenticado: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}

                {{-- Nota: La tabla `order_statuses` contiene todos los tipos de estados de pedidos (que solo pueden ser actualizados por 'admins' en la tabla `orders`) como: pendiente, en progreso, enviado, cancelado, etc. En la tabla `order_statuses`, la columna `name` puede ser: 'Nuevo', 'Pendiente', 'Cancelado', 'En Progreso', 'Enviado', 'Parcialmente Enviado', 'Entregado', 'Parcialmente Entregado' y 'Pagado'. 'Parcialmente Enviado': Si un pedido tiene productos de diferentes vendedores, y un vendedor ha enviado su producto al cliente mientras que otros vendedores no. 'Parcialmente Entregado': si un pedido tiene productos de diferentes vendedores, y un vendedor ha enviado y ENTREGADO su producto al cliente mientras que otros vendedores no! // La tabla `order_item_statuses` contiene todos los tipos de estados de pedidos (que pueden ser actualizados tanto por 'vendedores' como por 'admins' en la tabla `orders_products`) como: pendiente, en progreso, enviado, cancelado, etc. --}}

                <form action="{{ url('admin/update-order-status') }}" method="post">  {{-- determinado solo por 'admins', no por 'vendedores'. Esto contrasta con el 'Estado del Item de Pedido' que puede ser actualizado tanto por 'vendedores' como por 'admins' --}} 
                    @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                    <input type="hidden" name="order_id" value="{{ $orderDetails['id'] }}">

                    <select name="order_status" id="order_status" required>
                        <option value="" selected>Seleccionar</option>
                        @foreach ($orderStatuses as $status)
                            <option value="{{ $status['name'] }}"  @if (!empty($orderDetails['order_status']) && $orderDetails['order_status'] == $status['name']) selected @endif>{{ $status['name'] }}</option>
                        @endforeach
                    </select>

                    {{-- Nota: Hay dos tipos de Proceso de Envío: "manual" y "automático". "Manual" es en el caso de pequeñas empresas, donde el mensajero llega al almacén del propietario para recoger el pedido para su envío, y el propietario de la pequeña empresa toma los detalles del envío (como el nombre del mensajero, número de seguimiento, ...) del mensajero, y esos detalles son insertados por sí mismos en el Panel de Administración cuando actualizan la sección "Actualizar Estado del Pedido" (por un 'admin') o "Actualizar Estado del Item" (por un 'vendedor' o 'admin') (en admin/orders/order_details.blade.php). Con el proceso de envío "automático", estamos integrando APIs de terceros y los pedidos van directamente al socio de envío, y las actualizaciones vienen del lado del mensajero, y los pedidos se entregan automáticamente a los clientes --}}

                    <input type="text" name="courier_name" id="courier_name" placeholder="Nombre del Mensajero">    {{-- Este campo de entrada solo aparecerá cuando se seleccione la opción 'Enviado'. Verifica admin/js/custom.js --}}
                    <input type="text" name="tracking_number" id="tracking_number" placeholder="Número de Seguimiento"> {{-- Este campo de entrada solo aparecerá cuando se seleccione la opción 'Enviado'. Verifica admin/js/custom.js --}}

                    <button type="submit">Actualizar</button>
                </form>
                <br>

                {{-- Mostrar el historial/registros de "Actualizar Estado del Pedido" en admin/orders/order_details.blade.php --}}
                @foreach ($orderLog as $key => $log)
                    @php
                        // echo '<pre>', var_dump($log), '</pre>';
                        // echo '<pre>', var_dump($log['orders_products']), '</pre>';
                        // echo '<pre>', var_dump($key), '</pre>';
                        // echo '<pre>', var_dump($log['orders_products'][$key]), '</pre>';
                        // echo '<pre>', var_dump($log['orders_products'][$key]['product_code']), '</pre>';
                    @endphp

                    <strong>{{ $log['order_status'] }}</strong>

                    {{-- Integración con la API de Shiprocket --}}
                    @if ($orderDetails['is_pushed'] == 1) {{-- Si el Pedido ha sido enviado a Shiprocket, indicar esto --}}
                        <span style="color: green">(Pedido Enviado a Shiprocket)</span>
                    @endif

                    {{-- Nota: Hay dos tipos de Proceso de Envío: "manual" y "automático". "Manual" es en el caso de pequeñas empresas, donde el mensajero llega al almacén del propietario para recoger el pedido para su envío, y el propietario de la pequeña empresa toma los detalles del envío (como el nombre del mensajero, número de seguimiento, ...) del mensajero, y esos detalles son insertados por sí mismos en el Panel de Administración cuando actualizan la sección "Actualizar Estado del Pedido" (por un 'admin') o "Actualizar Estado del Item" (por un 'vendedor' o 'admin') (en admin/orders/order_details.blade.php). Con el proceso de envío "automático", estamos integrando APIs de terceros y los pedidos van directamente al socio de envío, y las actualizaciones vienen del lado del mensajero, y los pedidos se entregan automáticamente a los clientes --}}

                    {{-- Mostrar si el estado del pedido visualizado en la sección "Actualizar Estado del Pedido" en admin/orders/order_details.blade.php fue actualizado desde la sección "Actualizar Estado del Item" (que puede ser actualizada por 'vendedores' o 'admins') (en caso de que la columna `order_item_id` NO sea cero 0 (es 0 en caso de ser actualizado solo por 'admins' en la sección "Actualizar Estado del Pedido")) o desde la sección "Actualizar Estado del Pedido" (que puede ser actualizada solo por 'admins'). Verifica el método updateOrderItemStatus() en Admin/OrderController.php --}}
                    @if (isset($log['order_item_id']) && $log['order_item_id'] > 0) {{-- En caso de que la sección "Estado del Item" sea actualizada por un 'vendedor' o 'admin', la columna `order_item_id` en la tabla `orders_logs` referencia (es una clave foránea) a la columna `id` en la tabla `orders_products`, de lo contrario, toma 0 como valor (en caso de 'admin'). Verifica el método updateOrderItemStatus() en Admin/OrderController.php --}}
                        @php
                            $getItemDetails = \App\Models\OrdersLog::getItemDetails($log['order_item_id']);
                        @endphp
                        - para el artículo {{ $getItemDetails['product_code'] }}

                        @if (!empty($getItemDetails['courier_name']))
                            <br>
                            <span>Nombre del Mensajero: {{ $getItemDetails['courier_name'] }}</span>
                        @endif

                        @if (!empty($getItemDetails['tracking_number']))
                            <br>
                            <span>Número de Seguimiento: {{ $getItemDetails['tracking_number'] }}</span>
                        @endif

                    @endif

                    <br>
                    {{ date('Y-m-d h:i:s', strtotime($log['created_at'])) }}
                    <br>
                    <hr>
                @endforeach

            @else {{-- Si el usuario autenticado/logueado es 'vendedor', restringir la función "Actualizar Estado del Pedido" --}}
                Esta función está restringida.
            @endif

        </div>
    </div>
</div>



                
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Productos Pedidos</h4>

            <div class="table-responsive">
                {{-- Tabla de información de productos pedidos --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <th>Imagen del Producto</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Color</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad del Producto</th>
                        <th>Precio Total</th>

                        @if (\Illuminate\Support\Facades\Auth::guard('admin')->user()->type != 'vendor') {{-- Si el usuario autenticado es un 'admin', 'superadmin' o 'subadmin', NO 'vendor' --}}
                            <th>Producto por</th>
                        @endif

                        <th>Comisión</th> {{-- El porcentaje de comisión del vendedor que debe ser pagado por cada producto vendido al propietario del sitio web --}}
                        <th>Importe Final</th> {{-- Ganancia del vendedor después de pagar (deducir) el porcentaje de comisión --}}

                        <th>Estado del Artículo</th> {{-- Puede ser actualizado tanto por 'vendedores' como por 'admins'. Esto contrasta con 'Actualizar Estado del Pedido' que puede ser actualizado SOLO por 'admins' --}}
                    </tr>

                    @foreach ($orderDetails['orders_products'] as $product)
                        <tr>
                            <td>
                                @php
                                    $getProductImage = \App\Models\Product::getProductImage($product['product_id']);
                                @endphp

                                <a target="_blank" href="{{ url('product/' . $product['product_id']) }}">
                                    <img src="{{ asset('front/images/product_images/small/' . $getProductImage) }}">
                                </a>
                            </td>
                            <td>{{ $product['product_code'] }}</td>
                            <td>{{ $product['product_name'] }}</td>
                            <td>{{ $product['product_size'] }}</td>
                            <td>{{ $product['product_color'] }}</td>
                            <td>{{ $product['product_price'] }}</td>
                            <td>{{ $product['product_qty'] }}</td>
                            <td>

                                @if ($product['vendor_id'] > 0) {{-- Si el producto pertenece a un 'vendedor', no 'admin' --}}

                                    @if ($orderDetails['coupon_amount'] > 0) {{-- Si se ha utilizado un código de cupón --}}

                                        @if (\App\Models\Coupon::couponDetails($orderDetails['coupon_code'])['vendor_id'] > 0) {{-- Si se ha utilizado un código de cupón, y este código de cupón pertenece a un 'vendedor', no 'admin' --}}
                                            @php
                                                // dd(\App\Models\Coupon::couponDetails($orderDetails['coupon_code'])['vendor_id']);
                                            @endphp

                                            {{ $total_price = ($product['product_price'] * $product['product_qty']) - $item_discount }}
                                        @else {{-- Si se ha utilizado un código de cupón, y este código de cupón pertenece a un 'admin', no 'vendedor' --}}
                                            {{ $total_price = $product['product_price'] * $product['product_qty'] }}
                                        @endif

                                    @else {{-- Si no se ha utilizado un código de cupón --}}
                                        {{ $total_price = $product['product_price'] * $product['product_qty'] }}
                                    @endif

                                @else {{-- Si el producto pertenece a un 'admin', no 'vendedor' --}}
                                    {{ $total_price = $product['product_price'] * $product['product_qty'] }}
                                @endif
                            </td> {{-- Precio Total = Precio Unitario * Cantidad --}}

                            @if (\Illuminate\Support\Facades\Auth::guard('admin')->user()->type != 'vendor') {{-- Si el usuario autenticado es un 'admin', 'superadmin' o 'subadmin', NO 'vendor' --}}
                                @if ($product['vendor_id'] > 0) {{-- Si el producto pertenece a un 'vendedor' --}}
                                    <td>
                                        <a href="/admin/view-vendor-details/{{ $product['admin_id'] }}" target="_blank">Vendedor</a>
                                    </td>
                                @else
                                    <td>Admin</td>
                                @endif
                            @endif

                            @if ($product['vendor_id'] > 0) {{-- Si el producto pertenece a un 'vendedor' --}}
                                <td>{{ $commission = round($total_price * $product['commission'] / 100, 2) }}</td>
                                <td>{{ $total_price - $commission }}</td>
                            @else
                                <td>0</td>
                                <td>{{ $total_price }}</td>
                            @endif

                            <td>
                                {{-- Nota: La tabla `order_statuses` contiene todos los tipos de estados de pedidos (que pueden ser actualizados solo por 'admins' en la tabla `orders`) como: pendiente, en progreso, enviado, cancelado, ...etc. En la tabla `order_statuses`, la columna `name` puede ser: 'Nuevo', 'Pendiente', 'Cancelado', 'En Progreso', 'Enviado', 'Parcialmente Enviado', 'Entregado', 'Parcialmente Entregado' y 'Pagado'. 'Parcialmente Enviado': Si un pedido tiene productos de diferentes vendedores, y un vendedor ha enviado su producto al cliente mientras que otros vendedores no lo han hecho. 'Parcialmente Entregado': Si un pedido tiene productos de diferentes vendedores, y un vendedor ha enviado y ENTREGADO su producto al cliente mientras que otros vendedores no lo han hecho! --}}
                                <form action="{{ url('admin/update-order-item-status') }}" method="post">  {{-- Puede ser actualizado tanto por 'vendedores' como por 'admins'. Esto contrasta con 'Actualizar Estado del Pedido' que puede ser actualizado SOLO por 'admins' --}}
                                    @csrf {{-- Previniendo solicitudes CSRF --}}

                                    <input type="hidden" name="order_item_id" value="{{ $product['id'] }}">

                                    <select id="order_item_status" name="order_item_status" required>
                                        <option value="">Seleccionar</option>
                                        @foreach ($orderItemStatuses as $status)
                                            <option value="{{ $status['name'] }}"  @if (!empty($product['item_status']) && $product['item_status'] == $status['name']) selected @endif>{{ $status['name'] }}</option>
                                        @endforeach
                                    </select>

                                    {{-- Nota: Hay dos tipos de proceso de envío: "manual" y "automático". "Manual" es el caso de pequeñas empresas, donde el mensajero llega al almacén del propietario para recoger el pedido para el envío, y el propietario del pequeño negocio toma los detalles del envío (como el nombre del mensajero, número de seguimiento, ...) del mensajero, e inserta esos detalles él mismo en el panel de administración cuando actualizan el estado del pedido. Con el proceso de envío "automático", estamos integrando APIs de terceros y los pedidos van directamente al socio de envío, y las actualizaciones vienen del lado del mensajero, y los pedidos se entregan automáticamente a los clientes --}}
                                    <input style="width: 110px" type="text" name="item_courier_name" id="item_courier_name" placeholder="Nombre del Mensajero" @if (!empty($product['courier_name'])) value="{{ $product['courier_name'] }}" @endif> {{-- Este campo solo aparecerá cuando se seleccione la opción 'Enviado'. --}}
                                    <input style="width: 110px" type="text" name="item_tracking_number" id="item_tracking_number" placeholder="Número de Seguimiento" @if (!empty($product['tracking_number'])) value="{{ $product['tracking_number'] }}" @endif> {{-- Este campo solo aparecerá cuando se seleccione la opción 'Enviado'. --}}

                                    <button type="submit">Actualizar</button>
                                </form>
                            </td>
                        </tr>         
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


            </div>


        </div>
        <!-- content-wrapper ends -->

        {{-- Footer --}}
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection