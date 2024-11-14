{{-- Esta es la Factura HTML del Pedido. Esta página es renderizada por el método viewOrderInvoice() en Admin/OrderController.php --}}

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Factura</h2>
                <h3 class="pull-right">
                    Pedido # {{ $orderDetails['id'] }}

                    {{-- Paquete de generación de códigos de barras/QR de Laravel (para mostrar códigos de barras/QR para el ID del Producto y el Código del Producto): https://github.com/milon/barcode --}}
                    @php
                        echo DNS1D::getBarcodeHTML($orderDetails['id'], 'C39');       // Este es el código de barras del `id` del producto
                        // echo DNS2D::getBarcodeHTML($orderDetails['id'], 'QRCODE'); // Este es el código QR del `id` del producto
                    @endphp
                </h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				    <strong>Facturado a:</strong><br>
    					{{ $userDetails['name'] }}<br>

                        @if (!empty($userDetails['address']))
                            {{ $userDetails['address'] }}<br>
                        @endif
                        @if (!empty($userDetails['city']))
                            {{ $userDetails['city'] }}<br>
                        @endif
                        @if (!empty($userDetails['state']))
                            {{ $userDetails['state'] }}<br>
                        @endif
                        @if (!empty($userDetails['country']))
                            {{ $userDetails['country'] }}<br>
                        @endif
                        @if (!empty($userDetails['pincode']))
                            {{ $userDetails['pincode'] }}<br>
                        @endif

                        {{ $userDetails['mobile'] }}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			    <strong>Enviado a:</strong><br>
                        {{ $orderDetails['name'] }}<br>
                        {{ $orderDetails['address'] }}<br>
                        {{ $orderDetails['city'] }}, {{ $orderDetails['state'] }}<br>
                        {{ $orderDetails['country'] }}-{{ $orderDetails['pincode'] }}<br>
                        {{ $userDetails['mobile'] }}<br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Método de Pago:</strong><br>
                        {{ $orderDetails['payment_method'] }}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Fecha del Pedido:</strong><br>
    					{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Resumen del Pedido</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Código del Producto</strong></td>
        							<td class="text-center"><strong>Tamaño</strong></td>
        							<td class="text-center"><strong>Color</strong></td>
        							<td class="text-center"><strong>Precio</strong></td>
        							<td class="text-center"><strong>Cantidad</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>

                                {{-- Calcular el Subtotal --}}
                                @php
                                    $subTotal = 0;
                                @endphp

                                @foreach ($orderDetails['orders_products'] as $product)
                                    <tr>
                                        <td>
                                            {{ $product['product_code'] }}

                                            {{-- Paquete de generación de códigos de barras/QR de Laravel (para mostrar códigos de barras/QR para el ID del Producto y el Código del Producto) --}}
                                            @php
                                                echo DNS1D::getBarcodeHTML($product['product_code'], 'C39');       // Este es el código de barras del `product_code` del producto
                                            @endphp
                                        </td>
                                        <td class="text-center">{{ $product['product_size'] }}</td>
                                        <td class="text-center">{{ $product['product_color'] }}</td>
                                        <td class="text-center">Bs {{ $product['product_price'] }}</td>
                                        <td class="text-center">{{ $product['product_qty'] }}</td>
                                        <td class="text-right">Bs {{ $product['product_price'] * $product['product_qty'] }}</td>
                                    </tr>

                                    {{-- Continuar calculando el Subtotal --}}
                                    @php
                                        $subTotal = $subTotal + ($product['product_price'] * $product['product_qty'])
                                    @endphp
                                @endforeach

                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-right"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">Bs {{ $subTotal }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>Cargos de Envío</strong></td>
                                    <td class="no-line text-right">Bs 0</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>Total General</strong></td>
                                    <td class="no-line text-right">
                                        <strong>Bs {{ $orderDetails['grand_total'] }}</strong>
                                        <br>

                                        @if ($orderDetails['payment_method'] == 'COD')
                                            <font color=red>(Ya Pagado)</font>
                                        @endif
                                    </td>
                                </tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
