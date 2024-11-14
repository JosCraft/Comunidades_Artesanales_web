{{-- Nota: cart.blade.php es la página que se abre cuando tú ... --}}
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
                        <a href="cart.html">Carrito</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contenedor de Introducción de Página /- -->
    <!-- Página del Carrito -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">

                {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}} 
                {{-- Determinando Si Un Artículo Existe En La Sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
                {{-- Mostrando Mensaje de Éxito --}}
                @if (Session::has('success_message')) <!-- Ver método vendorRegister() en Front/VendorController.php -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Éxito:</strong> {{ Session::get('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- Mostrando Mensajes de Error --}}
                @if (Session::has('error_message')) <!-- Ver método vendorRegister() en Front/VendorController.php -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> {{ Session::get('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- Mostrando Mensajes de Error --}}
                @if ($errors->any()) <!-- Ver método vendorRegister() en Front/VendorController.php -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

            <div class="row">
                <div class="col-lg-12">

                    <div id="appendCartItems"> {{-- Incluimos este archivo para permitir la llamada AJAX en front/js/custom.js al actualizar las cantidades de los pedidos en el Carrito --}}
                        @include('front.products.cart_items')
                    </div>

                    {{-- Para resolver el problema de que el envío del código de cupón solo funcione una vez, movimos la parte del cupón de cart_items.blade.php a aquí en cart.blade.php --}} {{-- Explicación del problema: http://publicvoidlife.blogspot.com/2014/03/on-on-or-event-delegation-explained.html --}}
                    <!-- Cupón -->
                    <div class="coupon-continue-checkout u-s-m-b-60">
                        <div class="coupon-area">
                            <h6>Ingresa tu código de cupón si tienes uno.</h6>
                            <div class="coupon-field">

                                {{-- Nota: Para los Cupones, el usuario debe estar registrado (autenticado) para poder canjearlos. Tanto 'administradores' como 'vendedores' pueden agregar Cupones. Los cupones agregados por 'vendedores' estarán disponibles solo para sus productos, pero los agregados por 'administradores' estarán disponibles para TODOS los productos. --}}

                                <form id="applyCoupon" method="post" action="javascript:void(0)"  @if (\Illuminate\Support\Facades\Auth::check()) user=1 @endif> {{-- Creamos un id para este <form> para usarlo como manejador en jQuery para el envío a través de AJAX. Ver front/js/custom.js --}} {{-- Solo los usuarios registrados (autenticados) pueden canjear el cupón, así que hacemos una condición, si el usuario está registrado (autenticado), creamos ese atributo HTML personalizado 'user = 1' para que jQuery pueda usarlo para enviar el formulario. Ver front/js/custom.js --}} {{-- Nota: Necesitamos desactivar el atributo 'action' HTML (usando    action="javascript:void(0)"    ) ya que vamos a enviar usando una llamada AJAX. Ver front/js/custom.js --}}
                                    <label class="sr-only" for="coupon-code">Aplicar Cupón</label>
                                    <input type="text" class="text-field" placeholder="Ingresa el Código del Cupón" id="code" name="code">
                                    <button type="submit" class="button">Aplicar Cupón</button>
                                </form>

                            </div>
                        </div>
                        <div class="button-area">
                            <a href="{{ url('/') }}" class="continue">Continuar Comprando</a>
                            <a href="{{ url('/checkout') }}" class="checkout">Proceder al Pago</a>
                        </div>
                    </div>
                    <!-- Cupón /- -->

                </div>
            </div>
        </div>
    </div>
    <!-- Página del Carrito /- -->
@endsection
