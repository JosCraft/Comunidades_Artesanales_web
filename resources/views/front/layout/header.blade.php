<?php
// Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
$sections = \App\Models\Section::sections();
// dd($sections);
?>



<!-- Header -->
<header>
    <!-- Top-Header -->
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
                        <a>Pago
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                          
                            <li>
                                <a href="#">(Bs.) Bolivianos</a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('front/images/main-logo/main-logo.png') }}" alt="Multi-vendor E-commerce Application" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">
                    {{-- Formulario de búsqueda del sitio web (para buscar todos los productos del sitio) --}}
                    <form class="form-searchbox" action="{{ url('/search-products') }}" method="get">
                        <label class="sr-only" for="search-landscape">Buscar</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="Buscar todo" name="search" @if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{ $_REQUEST['search'] }}" @endif> {{-- Usamos el atributo "name" de HTML como clave/nombre para el atributo "value" de HTML para enviar el formulario de búsqueda. Revisa el atributo "value" de HTML también dentro de la etiqueta <option> más abajo! --}} {{-- si el usuario usa el formulario de búsqueda --}}
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Elige categoría para buscar</label>
                                <select class="select-box" id="select-category" name="section_id">
                                    <option selected="selected" value="">Todo</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section['id'] }}" @if (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']) selected @endif>{{ $section['name'] }}</option> {{-- menú desplegable de búsqueda en la parte superior --}} {{-- Usamos el atributo "value" de HTML como un valor para el atributo "name" de HTML para enviar el formulario de búsqueda. Revisa el atributo "name" de HTML también dentro de la etiqueta <input> arriba! --}}
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
                                    <span class="item-counter totalCartItems">{{ totalCartItems() }}</span> {{-- La función totalCartItems() está en nuestro archivo Helpers/Helper.php que hemos registrado en el archivo 'composer.json' --}} {{-- Creamos la clase CSS 'totalCartItems' para usarla en front/js/custom.js para actualizar el total de artículos del carrito a través de AJAX, porque en páginas donde originalmente usamos AJAX para actualizar los artículos del carrito (como cuando eliminamos un artículo del carrito en http://127.0.0.1:8000/cart usando AJAX), el número no cambia en el encabezado automáticamente porque ya se ha utilizado AJAX y no ha habido una recarga/actualización de la página --}}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->



<!-- Widget de Carrito Mini -->
<div id="appendHeaderCartItems"> {{-- Creamos la clase CSS 'appendHeaderCartItems' para usarla en front/js/custom.js para actualizar el total de artículos del carrito a través de AJAX en el Widget de Carrito Mini, porque en páginas donde originalmente usamos AJAX para actualizar los artículos del carrito (como cuando eliminamos un artículo del carrito en http://127.0.0.1:8000/cart usando AJAX), el número no cambia en el encabezado automáticamente porque ya se ha utilizado AJAX y no ha habido una recarga/actualización de la página --}}
    @include('front.layout.header_cart_items')
</div>
<!-- Widget de Carrito Mini /- -->

<!-- Encabezado Inferior -->
<div class="full-layer-bottom-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="v-menu v-close">
                    <span class="v-title">
                        <i class="ion ion-md-menu"></i>
                        Todas las Categorías
                        <i class="fas fa-angle-down"></i>
                    </span>
                    <nav>
                        <div class="v-wrapper">
                            <ul class="v-list animated fadeIn">

                                @foreach ($sections as $section)
                                    @if (count($section['categories']) > 0) {{-- si la sección tiene categorías secundarias, muestra el nombre de la sección, pero si no lo tiene, no la muestra --}}
                                        <li class="js-backdrop">
                                            <a href="javascript:;">
                                                <i class="ion-ios-add-circle"></i>
                                                {{ $section['name'] }} {{-- Mostrar nombre de la sección --}}
                                                <i class="ion ion-ios-arrow-forward"></i>
                                            </a>
                                            <button class="v-button ion ion-md-add"></button>
                                            <div class="v-drop-right" style="width: 700px;">
                                                <div class="row">

                                                    @foreach ($section['categories'] as $category) {{-- Mostrar las categorías secundarias de la sección --}}
                                                        <div class="col-lg-4">
                                                            <ul class="v-level-2">
                                                                <li>
                                                                    <a href="{{ url($category['url']) }}">{{ $category['category_name'] }}</a>
                                                                    <ul>

                                                                        @foreach ($category['sub_categories'] as $subcategory) {{-- Mostrar las subcategorías de las categorías secundarias de la sección --}}
                                                                            <li>
                                                                                <a href="{{ url($subcategory['url']) }}">{{ $subcategory['category_name'] }}</a>
                                                                            </li>
                                                                        @endforeach

                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-9">
                <ul class="bottom-nav g-nav u-d-none-lg">
                    <li>
                        <a href="{{ url('search-products?search=new-arrivals') }}">Nuevos Llegados 
                        <span class="superscript-label-new">NUEVO</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('search-products?search=best-sellers') }}">Más Vendidos 
                        <span class="superscript-label-hot">CALIENTE</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('search-products?search=featured') }}">Destacados 
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('search-products?search=discounted') }}">Descuentos 
                        <span class="superscript-label-discount">>10%</span>
                        </a>
                    </li>
                    <li class="mega-position">
                        <a>Más
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <div class="mega-menu mega-3-colm">
                            <ul>
                                <li class="menu-title">EMPRESA</li>
                                <li>
                                    <a href="{{ url('about-us') }}" class="u-c-brand">Sobre Nosotros</a>
                                </li>
                                <li>
                                    <a href="{{ url('contact') }}">Contáctanos</a>
                                </li>
                                <li>
                                    <a href="{{ url('faq') }}">Preguntas Frecuentes</a>
                                </li>
                            </ul>
                            <ul>
                                <li class="menu-title">COLECCIÓN</li>
                                <li>
                                    <a href="{{ url('men') }}">Ropa de Hombre</a>
                                </li>
                                <li>
                                    <a href="{{ url('women') }}">Ropa de Mujer</a>
                                </li>
                                <li>
                                    <a href="{{ url('kids') }}">Ropa de Niños</a>
                                </li>
                            </ul>
                            <ul>
                                <li class="menu-title">CUENTA</li>
                                <li>
                                    <a href="{{ url('user/account') }}">Mi Cuenta</a>
                                </li>
                                <li>
                                    <a href="{{ url('user/orders') }}">Mis Pedidos</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Encabezado Inferior /- -->

</header>
<!-- Header /- -->