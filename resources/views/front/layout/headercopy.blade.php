<?php
// Obteniendo solo las secciones 'habilitadas' y sus categorías hijas (usando el método de relación 'categories'), que a su vez incluyen sus 'subcategorías'
$sections = \App\Models\Section::sections();
// dd($sections);
?>

<!-- Encabezado -->
<header>
    <!-- Encabezado Superior -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+201255845857">
                        <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                        Teléfono: +201255845857</a>
                    </li>
                    <li>
                        <a href="mailto:info@multi-vendore-commerce.com">
                        <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                        Correo Electrónico: info@multi-vendore-commerce.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>
                        <a>
                            {{-- Si el usuario está autenticado/conectado, mostrar 'Mi Cuenta', si no, mostrar 'Iniciar Sesión/Registro' --}} 
                            @if (\Illuminate\Support\Facades\Auth::check()) {{-- Determinando si el usuario actual está autenticado: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                Mi Cuenta
                            @else
                                Iniciar Sesión/Registro
                            @endif

                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="{{ url('cart') }}">
                                <i class="fas fa-cog u-s-m-r-9"></i>
                                Mi Carrito</a>
                            </li>
                            <li>
                                <a href="{{ url('checkout') }}">
                                <i class="far fa-check-circle u-s-m-r-9"></i>
                                Pagar</a>
                            </li>

                            {{-- Si el usuario está autenticado/conectado, mostrar 'Mi Cuenta' y 'Cerrar Sesión', si no, mostrar 'Iniciar Sesión de Cliente' y 'Iniciar Sesión de Vendedor' --}} 
                            @if (\Illuminate\Support\Facades\Auth::check()) {{-- Determinando si el usuario actual está autenticado: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                <li>
                                    <a href="{{ url('user/account') }}"> 
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Mi Cuenta
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('user/orders') }}"> 
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Mis Pedidos
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('user/logout') }}"> 
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Cerrar Sesión
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('user/login-register') }}"> 
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Iniciar Sesión de Cliente
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('vendor/login-register') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Iniciar Sesión de Vendedor
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                    <li>
                        <a>Bs.
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">LE EGP</a>
                            </li>
                            <li>
                                <a href="#">($) USD</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>ENG
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="#" class="u-c-brand">ENG</a>
                            </li>
                            <li>
                                <a href="#">ARB</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Encabezado Superior /- -->
    <!-- Encabezado Medio -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('front/images/main-logo/main-logo.png') }}" alt="Aplicación de E-commerce Multi-vendedor" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">
                    {{-- Formulario de Búsqueda del Sitio Web (para buscar todos los productos del sitio web) --}} 
                    <form class="form-searchbox" action="{{ url('/search-products') }}" method="get">
                        <label class="sr-only" for="search-landscape">Buscar</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="Buscar todo" name="search" @if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{ $_REQUEST['search'] }}" @endif> {{-- Usamos el atributo HTML "name" como clave/nombre para el atributo HTML "value" para enviar el Formulario de Búsqueda. Verifique también el atributo "value" HTML dentro de la etiqueta <option> HTML más abajo! --}} {{-- si el usuario utiliza el Formulario de Búsqueda --}}
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Elige categoría para buscar</label>
                                <select class="select-box" id="select-category" name="section_id">
                                    <option selected="selected" value="">Todo</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section['id'] }}"  @if (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']) selected @endif>{{ $section['name'] }}</option> {{-- el menú desplegable de búsqueda en la parte superior --}} {{-- Usamos el atributo HTML "value" como un valor para el atributo HTML "name" para enviar el Formulario de Búsqueda. Verifique también el atributo "name" HTML dentro de la etiqueta <input> HTML más arriba! --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>

                    @php
                        // dd($_GET);
                    @endphp

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="{{ url('/') }}">
                                <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger">
                                <i class="ion ion-md-basket"></i>
                                <span class="item-counter totalCartItems">{{ totalCartItems() }}</span> {{-- La función totalCartItems() está en nuestro archivo personalizado Helpers/Helper.php que hemos registrado en el archivo 'composer.json' --}} {{-- Creamos la clase CSS 'totalCartItems' para usarla en front/js/custom.js para actualizar el total de artículos del carrito a través de AJAX, porque en las páginas donde originalmente usamos AJAX para actualizar los artículos del carrito (como cuando eliminamos un artículo del carrito en http://127.0.0.1:8000/cart usando AJAX), el número no cambia en el encabezado automáticamente porque AJAX ya se ha utilizado y no se ha producido ninguna recarga/actualización de la página --}}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Encabezado Medio /- -->
    <!-- Botones Responsivos -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
    </div>
    <!-- Botones Responsivos /- -->

    <!-- Widget de Mini Carrito -->
    <div id="appendHeaderCartItems"> {{-- Creamos la clase CSS 'appendHeaderCartItems' para usarla en front/js/custom.js para actualizar el total de artículos del carrito a través de AJAX en el Widget de Mini Carrito. --}} 
        <div class="mini-cart-container">
            <div class="mini-cart-header">
                <span class="mini-cart-title">Tu Carrito</span>
                <span class="mini-cart-total">Bs. <span class="mini-cart-total-price">{{ Cart::getTotal() }}</span></span> {{-- Usamos Cart::getTotal() para obtener el precio total --}} 
                <button class="close-mini-cart fas fa-times" id="close-mini-cart"></button>
            </div>
            <ul class="mini-cart-items">
                @if (Cart::isEmpty()) {{-- Si el carrito de compras está vacío --}}
                    <li class="empty-cart">
                        <p>No hay productos en tu carrito.</p>
                    </li>
                @else
                    @foreach (Cart::getContent() as $cartItem) {{-- Obtener todos los elementos del carrito de compras --}}
                        <li>
                            <div class="mini-cart-image">
                                <a href="{{ url('product/' . $cartItem->id) }}">
                                    <img src="{{ asset('storage/product/' . $cartItem->attributes->image) }}" alt="{{ $cartItem->name }}">
                                </a>
                            </div>
                            <div class="mini-cart-content">
                                <a href="{{ url('product/' . $cartItem->id) }}">{{ $cartItem->name }}</a>
                                <span class="mini-cart-price">Bs. {{ $cartItem->price }}</span>
                                <div class="mini-cart-quantity">
                                    <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" step="1">
                                    <button class="button-update-cart fas fa-sync-alt" id="update-cart-item" data-id="{{ $cartItem->id }}"></button>
                                    <button class="button-remove-cart fas fa-trash-alt" id="remove-cart-item" data-id="{{ $cartItem->id }}"></button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="mini-cart-footer">
                <a href="{{ url('cart') }}" class="button button-primary">Ver Carrito</a>
                <a href="{{ url('checkout') }}" class="button button-secondary">Pagar</a>
            </div>
        </div>
    </div>
    <!-- Widget de Mini Carrito /- -->
</header>
