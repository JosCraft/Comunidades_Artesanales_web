{{-- This page is rendered by index() method in Front/IndexController.php --}}
@extends('front.layout.layout')

<!-- C:\xampp\htdocs\Comunidad_Artesanal\resources\views\front\INDEX.BLADE.PHP -->
@section('content')
            <!-- Main-Slider -->
            <!-- Carrusel Principal -->
        <div class="default-height ph-item">
            <div class="slider-main owl-carousel">

                {{-- Mostrar el banner dinámicamente dependiendo de la elección del Panel de Administración --}} 
                @foreach ($sliderBanners as $banner)
                    <div class="bg-image">
                        <div class="slide-content">
                            <h1>
                                <a @if (!empty($banner['link'])) href="{{ url($banner['link']) }}" @else href="javascript:;" @endif>
                                    <img src="{{ asset('front/images/banner_images/' . $banner['image']) }}" title="{{ $banner['title'] }}" alt="{{ $banner['title'] }}">
                                </a>
                            </h1>
                            <h2>{{ $banner['title'] }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Carrusel Principal /- -->

        @if (isset($fixBanners[1]['image']))
            <!-- Capa del Banner -->
            <div class="banner-layer">
                <div class="container">
                    <div class="image-banner">
                        <a target="_blank" rel="nofollow" href="{{ url($fixBanners[1]['link']) }}" class="mx-auto banner-hover effect-dark-opacity">
                            <img class="img-fluid" src="{{ asset('front/images/banner_images/' . $fixBanners[1]['image']) }}" alt="{{ $fixBanners[1]['alt'] }}" title="{{ $fixBanners[1]['title'] }}">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Capa del Banner /- -->    
        @endif




    <!-- Top Collection -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3">TOP COLECCIÓN</h3>
                <ul class="nav tab-nav-style-1-a justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#men-latest-products">Nuevos Llegados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">Más Vendidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#discounted-products">Productos con Descuento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#men-featured-products">Productos Destacados</a>
                    </li>

                </ul>
            </div>
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                     

                        <div class="tab-pane active show fade" id="men-latest-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">

                                    {{-- Mostrar 'Nuevos Productos'. Mostrar solo los 8 PRODUCTOS MÁS RECIENTES. Ver el método index() en IndexController.php --}} 
                                    @foreach ($newProducts as $product)
                                        @php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                            // dd($product['product_image']);
                                            // dd($product_image_path);
                                            // if (!empty($product['product_image']) && file_exists($product_image_path)) {
                                            //     dd('Sí');
                                            // } else {
                                            //     dd('No');
                                            // }
                                        @endphp

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">
                                                    @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- si la imagen del producto existe EN ambas: tabla de base de datos Y sistema de archivos (en el servidor) --}}
                                                        <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Producto">
                                                    @else {{-- mostrar la imagen de prueba --}}
                                                        <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Producto">
                                                    @endif
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal" href="#quick-view">Vista Rápida</a>
                                                    <a class="item-mail" href="javascript:void(0)">Correo</a>
                                                    <a class="item-addwishlist" href="javascript:void(0)">Agregar a la Lista de Deseos</a>
                                                    <a class="item-addCart" href="{{ url('product/' . $product['id']) }}">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_code'] }}</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                    </h6>   
<!--SE CAMBIO----------------------------------------------------- /- -->                 
                                                    <div title="{{ $product->avgRating ?? 0 }} de 5 - basado en {{ $product->ratings_count ?? 0 }} reseñas">   
                                                    {{-- Mostrar las estrellas de calificación si el producto tiene reseñas --}}
                                                        @if ($product->avgRating > 0)
                                                            @for ($star = 1; $star <= floor($product->avgRating); $star++)
                                                                <span style="color: gold; font-size: 17px">&#9733;</span> <!-- Mostrar estrellas completas -->
                                                            @endfor

                                                            @if ($product->avgRating - floor($product->avgRating) >= 0.5)
                                                                <span style="color: gold; font-size: 17px">&#9734;</span> <!-- Mostrar media estrella -->
                                                            @endif

                                                            ({{ number_format($product->avgRating, 1) }}) <!-- Mostrar la calificación promedio con un decimal -->
                                                        @else
                                                            (0.0) <!-- Si no hay calificaciones, mostrar 0.0 -->
                                                        @endif
                                                        
                                                        <span> - {{ $product->ratings_count ?? 0 }} reseña{{ ($product->ratings_count ?? 0) !== 1 ? 's' : '' }}</span> <!-- Mostrar la cantidad de reseñas -->
                                                    </div>
 <!--SE CAMBIO----------------------------------------------------- /- -->
                                                </div>
                                                {{-- Llamar al método estático getDiscountPrice() en el modelo Product.php para determinar el precio final de un producto, ya que un producto puede tener un descuento de DOS cosas: ya sea un descuento de `CATEGORÍA` o un descuento de `PRODUCTO` --}}
                                                @php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                @endphp

                                                @if ($getDiscountPrice > 0) {{-- Si hay un descuento en el precio, mostrar el precio anterior (el precio original) y después (el nuevo precio) del descuento --}}
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Bs . {{ $getDiscountPrice }}
                                                        </div>
                                                        <div class="item-old-price">
                                                            Bs . {{ $product['product_price'] }}
                                                        </div>
                                                    </div>
                                                @else {{-- si no hay descuento en el precio, mostrar el precio original --}}
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Bs . {{ $product['product_price'] }}
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="tag new">
                                                <span>NUEVO</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show fade" id="men-best-selling-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">

                                    {{-- Mostrar los productos 'Más Vendidos'. Ver el método index() en IndexController.php --}} 
                                    @foreach ($bestSellers as $product)
                                        @php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                            // dd($product['product_image']);
                                            // dd($product_image_path);
                                            // if (!empty($product['product_image']) && file_exists($product_image_path)) {
                                            //     dd('Sí');
                                            // } else {
                                            //     dd('No');
                                            // }
                                        @endphp

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">
                                                    @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- si la imagen del producto existe EN ambas: tabla de base de datos Y sistema de archivos (en el servidor) --}}
                                                        <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Producto">
                                                    @else {{-- mostrar la imagen de prueba --}}
                                                        <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Producto">
                                                    @endif
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal" href="#quick-view">Vista Rápida</a>
                                                    <a class="item-mail" href="javascript:void(0)">Correo</a>
                                                    <a class="item-addwishlist" href="javascript:void(0)">Agregar a la Lista de Deseos</a>
                                                    <a class="item-addCart" href="{{ url('product/' . $product['id']) }}">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_code'] }}</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="0 de 5 - basado en 0 Reseñas">
                                                            <span style='width:0'></span>
                                                        </div>
                                                        <span>(0)</span>
                                                    </div>
                                                </div>

                                                {{-- Llamar al método estático getDiscountPrice() en el modelo Product.php para determinar el precio final de un producto, ya que un producto puede tener un descuento de DOS cosas: ya sea un descuento de `CATEGORÍA` o un descuento de `PRODUCTO` --}}
                                                @php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                @endphp
                                                @if ($getDiscountPrice > 0) {{-- Si hay un descuento en el precio, mostrar el precio anterior (el precio original) y después (el nuevo precio) del descuento --}}
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Bs . {{ $getDiscountPrice }}
                                                        </div>
                                                        <div class="item-old-price">
                                                            Bs . {{ $product['product_price'] }}
                                                        </div>
                                                    </div>
                                                @else {{-- si no hay descuento en el precio, mostrar el precio original --}}
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            Bs . {{ $product['product_price'] }}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="tag new">
                                                <span>NUEVO</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                       

                        <div class="tab-pane fade" id="discounted-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">
                                    {{-- Mostrar productos con descuento --}}
                                    @foreach ($discountedProducts as $product)
                                        @php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                        @endphp

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">
                                                    @if (!empty($product['product_image']) && file_exists($product_image_path))
                                                        <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Producto">
                                                    @else
                                                        <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Producto">
                                                    @endif
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal" href="#quick-view">Vista Rápida</a>
                                                    <a class="item-mail" href="javascript:void(0)">Enviar por Correo</a>
                                                    <a class="item-addwishlist" href="javascript:void(0)">Agregar a la Lista de Deseos</a>
                                                    <a class="item-addCart" href="{{ url('product/' . $product['id']) }}">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_code'] }}</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="0 de 5 - basado en 0 Reseñas">
                                                            <span style='width:0'></span>
                                                        </div>
                                                        <span>(0)</span>
                                                    </div>
                                                </div>

                                                @php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                @endphp
                                                <div class="price-template">
                                                    @if ($getDiscountPrice > 0)
                                                        <div class="item-new-price">Bs . {{ $getDiscountPrice }}</div>
                                                        <div class="item-old-price">Bs . {{ $product['product_price'] }}</div>
                                                    @else
                                                        <div class="item-new-price">Bs . {{ $product['product_price'] }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="tag new">
                                                <span>NUEVO</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="men-featured-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">
                                    {{-- Mostrar productos destacados --}}
                                    @foreach ($featuredProducts as $product)
                                        @php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                        @endphp

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">
                                                    @if (!empty($product['product_image']) && file_exists($product_image_path))
                                                        <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Producto">
                                                    @else
                                                        <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Producto">
                                                    @endif
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal" href="#quick-view">Vista Rápida</a>
                                                    <a class="item-mail" href="javascript:void(0)">Enviar por Correo</a>
                                                    <a class="item-addwishlist" href="javascript:void(0)">Agregar a la Lista de Deseos</a>
                                                    <a class="item-addCart" href="{{ url('product/' . $product['id']) }}">Agregar al Carrito</a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_code'] }}</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="0 de 5 - basado en 0 Reseñas">
                                                            <span style='width:0'></span>
                                                        </div>
                                                        <span>(0)</span>
                                                    </div>
                                                </div>

                                                @php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                @endphp
                                                <div class="price-template">
                                                    @if ($getDiscountPrice > 0)
                                                        <div class="item-new-price">Bs . {{ $getDiscountPrice }}</div>
                                                        <div class="item-old-price">Bs . {{ $product['product_price'] }}</div>
                                                    @else
                                                        <div class="item-new-price">Bs . {{ $product['product_price'] }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="tag new">
                                                <span>NUEVO</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Collection /- -->



    
    @if (isset($fixBanners[1]['image']))
        <!-- Capa de Banner -->
        <div class="banner-layer">
            <div class="container">
                <div class="image-banner">
                    <a target="_blank" rel="nofollow" href="{{ url($fixBanners[1]['link']) }}" class="mx-auto banner-hover effect-dark-opacity">
                        <img class="img-fluid" src="{{ asset('front/images/banner_images/' . $fixBanners[1]['image']) }}" alt="{{ $fixBanners[1]['alt'] }}" title="{{ $fixBanners[1]['title'] }}">
                    </a>
                </div>
            </div>
        </div>
        <!-- Capa de Banner /- -->    
    @endif

    <!-- Prioridades del Sitio -->
    <section class="app-priority">
        <div class="container">
            <div class="priority-wrapper u-s-p-b-80">
                <div class="row">
                    @php
                        $priorities = [
                            [
                                'icon' => 'ion-md-star',
                                'title' => 'Gran Valor',
                                'description' => 'Ofrecemos precios competitivos en nuestro rango de más de 100 millones de productos'
                            ],
                            [
                                'icon' => 'ion-md-cash',
                                'title' => 'Compra con Confianza',
                                'description' => 'Nuestra protección cubre tu compra desde el clic hasta la entrega'
                            ],
                            [
                                'icon' => 'ion-ios-card',
                                'title' => 'Pago Seguro',
                                'description' => 'Paga con los métodos de pago más populares y seguros del mundo'
                            ],
                            [
                                'icon' => 'ion-md-contacts',
                                'title' => 'Centro de Ayuda 24/7',
                                'description' => 'Asistencia todo el día para una experiencia de compra sin problemas'
                            ]
                        ];
                    @endphp

                    @foreach ($priorities as $priority)
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="single-item-wrapper">
                                <div class="single-item-icon">
                                    <i class="{{ $priority['icon'] }}"></i>
                                </div>
                                <h2>{{ $priority['title'] }}</h2>
                                <p>{{ $priority['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- Site-Priorities /- -->
@endsection