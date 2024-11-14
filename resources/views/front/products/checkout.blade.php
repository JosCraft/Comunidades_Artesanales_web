{{-- Note: This page (view) is rendered by the checkout() method in the Front/ProductsController.php --}}
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Pagar</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="checkout.html">Verificar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Checkout-Page -->
    <div class="page-checkout u-s-p-t-80">
        <div class="container">

            {{-- Showing the following HTML Form Validation Errors: (check checkout() method in Front/ProductsController.php) --}}
            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <!-- Second Accordion /- -->

                        <div class="row">
                            <!-- Detalles de Facturación y Envío -->
                            <div class="col-lg-6" id="deliveryAddresses"> {{-- Creamos este id="deliveryAddresses" para usarlo como un manejador para jQuery AJAX y refrescar esta página, ver front/js/custom.js --}}

                                @include('front.products.delivery_addresses')

                            </div>
                            <!-- Detalles de Facturación y Envío /- -->
                            <!-- Pago -->
                            <div class="col-lg-6">

                                {{-- El formulario HTML completo del usuario que envía su Dirección de Entrega y Método de Pago --}}
                                <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">
                                    @csrf {{-- Previniendo solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                    @if (count($deliveryAddresses) > 0) {{-- Comprobando si hay direcciones de entrega para el usuario autenticado/iniciado sesión actualmente --}} {{-- La variable $deliveryAddresses se pasa desde el método checkout() en Front/ProductsController.php --}}

                                        <h4 class="section-h4">Direcciones de Entrega</h4>

                                        @foreach ($deliveryAddresses as $address)
                                            <div class="control-group" style="float: left; margin-right: 5px">
                                                {{-- Usaremos los atributos de datos HTML personalizados: shipping_charges, total_price, coupon_amount, codpincodeCount y prepaidpincodeCount para usarlos como manejadores para que jQuery cambie los cálculos en la sección "Tu Pedido" utilizando jQuery. Ver el archivo front/js/custom.js --}}  
                                                <input type="radio" id="address{{ $address['id'] }}" name="address_id" value="{{ $address['id'] }}" shipping_charges="{{ $address['shipping_charges'] }}" total_price="{{ $total_price }}" coupon_amount="{{ \Illuminate\Support\Facades\Session::get('couponAmount') }}" codpincodeCount="{{ $address['codpincodeCount'] }}" prepaidpincodeCount="{{ $address['prepaidpincodeCount'] }}"> {{-- La variable $total_price se pasa desde el método checkout() en Front/ProductsController.php --}} {{-- Creamos el atributo HTML personalizado id="address{{ $address['id'] }}" para obtener los ids ÚNICOS de las direcciones para que el elemento <label> HTML pueda apuntar a ese <input> --}}
                                            </div>
                                            <div>
                                                <label class="control-label" for="address{{ $address['id'] }}">
                                                    {{ $address['name'] }}, {{ $address['address'] }}, {{ $address['city'] }}, {{ $address['state'] }}, {{ $address['country'] }} ({{ $address['mobile'] }})
                                                </label>
                                                <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="removeAddress" style="float: right; margin-left: 10px">Eliminar</a> {{-- Usamos href="javascript:;" para evitar que el enlace <a> sea clickeable (para hacer que el <a> no sea clickeable) (detener la función o acción del <a>) porque usaremos jQuery AJAX para hacer clic en este enlace, ver front/js/custom.js --}} {{-- Usamos la clase="removeAddress" como un manejador para la solicitud AJAX en front/js/custom.js --}}
                                                <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="editAddress" style="float: right">Editar</a>   {{-- Usamos href="javascript:;" para evitar que el enlace <a> sea clickeable (para hacer que el <a> no sea clickeable) (detener la función o acción del <a>) porque usaremos jQuery AJAX para hacer clic en este enlace, ver front/js/custom.js --}} {{-- Usamos la clase="editAddress" como un manejador para la solicitud AJAX en front/js/custom.js --}}
                                            </div>
                                        @endforeach
                                        <br>
                                    @endif 

                                    <h4 class="section-h4">Tu Pedido</h4>
                                    <div class="order-table">
                                        <table class="u-s-m-b-13">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                {{-- Colocaremos este $total_price dentro del bucle foreach para calcular el precio total de todos los productos en el carrito. Ver el final del siguiente bucle foreach antes de @endforeach --}}
                                                @php $total_price = 0 @endphp

                                                @foreach ($getCartItems as $item) {{-- $getCartItems se pasa desde el método cart() en Front/ProductsController.php --}}
                                                    @php
                                                        $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // desde la tabla `products_attributes`, no desde la tabla `products`
                                                    @endphp

                                                    <tr>
                                                        <td>
                                                            <a href="{{ url('product/' . $item['product_id']) }}">
                                                                <img width="50px" src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="Producto">
                                                                <h6 class="order-h6">{{ $item['product']['product_name'] }}
                                                                <br>
                                                                {{ $item['size'] }}/{{ $item['product']['product_color'] }}</h6>
                                                            </a>
                                                            <span class="order-span-quantity">x {{ $item['quantity'] }}</span>
                                                        </td>
                                                        <td>
                                                            <h6 class="order-h6">Bs.  {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}</h6> {{-- precio de todos los productos (después del descuento (si lo hay)) (= precio (después del descuento) * número de productos) --}}
                                                        </td>
                                                    </tr>

                                                    {{-- Esto se coloca aquí DENTRO del bucle foreach para calcular el precio total de todos los productos en el carrito --}}
                                                    @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                                @endforeach

                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Subtotal</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">Bs.  {{ $total_price }}</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Cargos de Envío</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            <span class="shipping_charges">Bs. 0</span>
                                                        </h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Descuento de Cupón</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            @if (\Illuminate\Support\Facades\Session::has('couponAmount')) {{-- Almacenamos el 'couponAmount' en una Variable de Sesión dentro del método applyCoupon() en Front/ProductsController.php --}}
                                                                <span class="couponAmount">Bs.  {{ \Illuminate\Support\Facades\Session::get('couponAmount') }}</span>
                                                            @else
                                                                Bs. 0
                                                            @endif
                                                        </h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Total General</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">
                                                            <strong class="grand_total">Bs. {{ $total_price - \Illuminate\Support\Facades\Session::get('couponAmount') }}</strong> {{-- Creamos la clase CSS 'grand_total' para usarla como un manejador para AJAX dentro de la función    $('#applyCoupon').submit();    en front/js/custom.js --}} {{-- Almacenamos el 'couponAmount' en una Variable de Sesión dentro del método applyCoupon() en Front/ProductsController.php --}}
                                                        </h3>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <div class="u-s-m-b-13 codMethod"> {{-- Agregamos la clase CSS codMethod para deshabilitar ese método de pago (ver front/js/custom.js) si el código PIN de la Dirección de Entrega de ese usuario no existe en nuestra tabla de base de datos `cod_pincodes` --}}
                                            <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery" value="COD">
                                            <label class="label-text" for="cash-on-delivery">Efectivo a la Entrega</label>
                                        </div>
                                        <div class="u-s-m-b-13 prepaidMethod"> {{-- Agregamos la clase CSS prepaidMethod para deshabilitar ese método de pago (ver front/js/custom.js) si el código PIN de la Dirección de Entrega de ese usuario no existe en nuestra tabla de base de datos `prepaid_pincodes` --}}
                                            <input type="radio" class="radio-box" name="payment_gateway" id="paypal" value="Paypal">
                                            <label class="label-text" for="paypal">QR</label>
                                        </div>

                                        {{-- Integración de pasarela de pago iyzipay en/con Laravel --}}
                                        <div class="u-s-m-b-13 prepaidMethod"> {{-- Agregamos la clase CSS prepaidMethod para deshabilitar ese método de pago (ver front/js/custom.js) si el código PIN de la Dirección de Entrega de ese usuario no existe en nuestra tabla de base de datos `prepaid_pincodes` --}}
                                            <input type="radio" class="radio-box" name="payment_gateway" id="iyzipay" value="iyzipay">
                                            <label class="label-text" for="iyzipay">Tarjeta de Crédito o Débito</label>
                                        </div>
                                        <div class="u-s-m-b-13">
                                    <input type="checkbox" class="check-box" id="accept" name="accept" value="Yes" title="Por favor, acepta los T&C">
                                    <label class="label-text no-color" for="accept">He leído y acepto los
                                        <a href="terms-and-conditions.html" class="u-c-brand">términos y condiciones</a>
                                    </label>
                                </div>
                                        <button type="submit" class="button">Realizar Pedido</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Pago /- -->

                        </div>

                    </div>
                </div>


        </div>
    </div>
    <!-- Checkout-Page /- -->
@endsection