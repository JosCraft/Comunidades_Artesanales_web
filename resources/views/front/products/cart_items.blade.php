{{-- Nota: Este archivo completo se incluye en front/products/cart.blade.php (para permitir la llamada AJAX al actualizar las cantidades de los pedidos en el carrito) --}}


<!-- Wrapper de la Lista de Productos -->
<div class="table-wrapper u-s-m-b-60">
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>


            {{-- Colocaremos este $total_price dentro del bucle foreach para calcular el precio total de todos los productos en el carrito. Verifica el final del siguiente bucle foreach antes de @endforeach --}}
            @php $total_price = 0 @endphp

            @foreach ($getCartItems as $item) {{-- $getCartItems se pasa desde el método cart() en Front/ProductsController.php --}}
                @php
                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // de la tabla `products_attributes`, no de la tabla `products`
                    // dd($getDiscountAttributePrice);
                @endphp

                <tr>
                    <td>
                        <div class="cart-anchor-image">
                            <a href="{{ url('product/' . $item['product_id']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="Producto">
                                <h6>
                                    {{ $item['product']['product_name'] }} ({{ $item['product']['product_code'] }}) - {{ $item['size'] }}
                                    <br>
                                    Color: {{ $item['product']['product_color'] }}
                                </h6>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            @if ($getDiscountAttributePrice['discount'] > 0) {{-- Si hay un descuento en el precio, muestra el precio antes (el precio original) y después (el nuevo precio) del descuento --}}
                                <div class="price-template">
                                    <div class="item-new-price">
                                        Bs. {{ $getDiscountAttributePrice['final_price'] }}
                                    </div>
                                    <div class="item-old-price" style="margin-left: -40px">
                                        Bs. {{ $getDiscountAttributePrice['product_price'] }}
                                    </div>
                                </div>
                            @else {{-- si no hay descuento en el precio, muestra el precio original --}}
                                <div class="price-template">
                                    <div class="item-new-price">
                                        Bs. {{ $getDiscountAttributePrice['final_price'] }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="cart-quantity">
                            <div class="quantity">
                                <input type="text" class="quantity-text-field" value="{{ $item['quantity'] }}">
                                <a data-max="1000" class="plus-a updateCartItem" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['quantity'] }}">&#43;</a> {{-- El signo más: Aumenta los artículos en 1 --}} {{-- La clase CSS .updateCartItem y los atributos HTML personalizados data-cartid & data-qty se utilizan para hacer la llamada AJAX en front/js/custom.js --}}
                                <a data-min="1" class="minus-a updateCartItem" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['quantity'] }}">&#45;</a> {{-- El signo menos: Disminuye los artículos en 1 --}} {{-- La clase CSS .updateCartItem y los atributos HTML personalizados data-cartid & data-qty se utilizan para hacer la llamada AJAX en front/js/custom.js --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            Bs. {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }} {{-- precio de todos los productos (después del descuento (si lo hay)) (= precio (después del descuento) * cantidad de productos) --}}
                        </div>
                    </td>
                    <td>
                        <div class="action-wrapper">
                            {{-- <button class="button button-outline-secondary fas fa-sync"></button> --}}
                            <button class="button button-outline-secondary fas fa-trash deleteCartItem" data-cartid="{{ $item['id'] }}"></button>{{-- La clase CSS .deleteCartItem y el atributo HTML personalizado data-cartid se utilizan para hacer la llamada AJAX en front/js/custom.js --}} 
                        </div>
                    </td>
                </tr>

                {{-- Esto se coloca aquí DENTRO del bucle foreach para calcular el precio total de todos los productos en el carrito --}}
                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
            @endforeach

        </tbody>
    </table>
</div>
<!-- Wrapper de la Lista de Productos /- -->

{{-- Para resolver el problema de que el envío del código de cupón solo funciona una vez, movimos la parte del cupón de cart_items.blade.php a aquí en cart.blade.php --}} {{-- Explicación del problema: http://publicvoidlife.blogspot.com/2014/03/on-on-or-event-delegation-explained.html --}}


<!-- Facturación -->
<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Totales del Carrito</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Subtotal</h3> {{-- Precio total antes de cualquier descuento de cupón --}}
                    </td>
                    <td>
                        <span class="calc-text">Bs.{{ $total_price }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Descuento de Cupón</h3>
                    </td>
                    <td>
                        <span class="calc-text couponAmount"> {{-- Creamos la clase CSS 'couponAmount' para usarla como un manejador para AJAX dentro de $('#applyCoupon').submit(); función en front/js/custom.js --}}
                            
                            @if (\Illuminate\Support\Facades\Session::has('couponAmount')) {{-- Almacenamos el 'couponAmount' en una variable de sesión dentro del método applyCoupon() en Front/ProductsController.php --}}
                                Bs. {{ \Illuminate\Support\Facades\Session::get('couponAmount') }}
                            @else
                                Bs. 0
                            @endif
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Total General</h3> {{-- Precio total después de descuentos de cupón (si los hay) --}}
                    </td>
                    <td>
                        <span class="calc-text grand_total">Bs.{{ $total_price - \Illuminate\Support\Facades\Session::get('couponAmount') }}</span> {{-- Creamos la clase CSS 'grand_total' para usarla como un manejador para AJAX dentro de $('#applyCoupon').submit(); función en front/js/custom.js --}} {{-- Almacenamos el 'couponAmount' en una variable de sesión dentro del método applyCoupon() en Front/ProductsController.php --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Facturación /- -->
