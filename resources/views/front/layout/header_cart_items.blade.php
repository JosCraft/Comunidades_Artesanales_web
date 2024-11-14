{{-- Este archivo se 'incluye' en front/layout/header.php. Separamos el widget del Mini Cart y lo cortamos de front/layout/header.blade.php a aquí --}}


<!-- Mini Carrito -->
<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
            TU CARRITO
            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        <ul class="mini-cart-list">

            {{-- Colocaremos este $total_price dentro del bucle foreach para calcular el precio total de todos los productos en el carrito. Verifica el final del siguiente bucle foreach antes de @endforeach --}}
            @php $total_price = 0 @endphp

            @php
                $getCartItems = getCartItems(); // La función getCartItems() está en nuestro archivo personalizado Helpers/Helper.php que hemos registrado en el archivo 'composer.json' --}} 
            @endphp

            @foreach ($getCartItems as $item) {{-- $getCartItems se pasa desde el método cart() en Front/ProductsController.php --}}
                @php
                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // de la tabla `products_attributes`, no de la tabla `products`
                    // dd($getDiscountAttributePrice);
                @endphp
                <li class="clearfix">
                    <a href="{{ url('product/' . $item['product_id']) }}">
                    <img src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="Producto">
                    <span class="mini-item-name">{{ $item['product']['product_name'] }}</span>
                    <span class="mini-item-price">Bs.{{ $getDiscountAttributePrice['final_price'] }}</span>
                    <span class="mini-item-quantity"> x {{ $item['quantity'] }} </span>
                    </a>
                </li>
                {{-- Esto se coloca aquí DENTRO del bucle foreach para calcular el precio total de todos los productos en el carrito --}}
                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
            @endforeach

        </ul>
        <div class="mini-shop-total clearfix">
            <span class="mini-total-heading float-left">Total:</span>
            <span class="mini-total-price float-right">Bs.{{ $total_price }}</span>
        </div>
        <div class="mini-action-anchors">
            <a href="{{ url('cart') }}"     class="cart-anchor">Ver Carrito</a>
            <a href="{{ url('checkout') }}" class="checkout-anchor">Finalizar Compra</a>
        </div>
    </div>
</div>
<!-- Mini Carrito /- -->


{{-- Solución al problema donde el icono X del widget del Mini Carrito no funciona (no cierra el widget) después de actualizar el carrito o eliminar artículos de él (es decir, DESPUÉS DE HACER LLAMADAS AJAX). Esto sucede después de usar AJAX al actualizar o eliminar artículos del carrito porque la página del widget del Mini Carrito se carga nuevamente y se devuelve a través de AJAX, pero se devuelve sin su JavaScript! --}} 
{{-- <script>
    $('#mini-cart-close').on('click', function () {
        $('.mini-cart-wrapper').removeClass('mini-cart-open');
    });
</script> --}}
