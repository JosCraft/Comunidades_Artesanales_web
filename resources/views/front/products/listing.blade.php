{{-- Nota: listing.blade.php es la página (renderizada por el método listing() en Front/ProductsController.php) que se abre cuando haces clic en una categoría en la página principal del FRONT --}}

@extends('front.layout.layout')

@section('content')
    <!-- Contenedor de Introducción de la Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Tienda</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="listing.html">Tienda</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contenedor de Introducción de la Página /- -->

    <!-- Página de la Tienda -->
    <div class="page-shop u-s-p-t-80">
        <div class="container">
            <!-- Introducción de la Tienda -->
            <div class="shop-intro">
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <a href="{{ url('/') }}">Inicio</a>
                    </li>

                    {{-- Migas de Pan --}}
                    @php echo $categoryDetails['breadcrumbs']; @endphp
                </ul>
            </div>
            <!-- Introducción de la Tienda /- -->
            <div class="row">

                {{-- Incluir la barra lateral de la página de listado (filtros de productos (tamaño, color, ...)) --}}
                @include('front.products.filters')

                <!-- Contenedor Derecho de la Tienda -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- Barra de Página -->
                    <div class="page-bar clearfix">

                        {{-- Si no se utiliza el formulario de búsqueda en front/layout/header.blade.php. Nota: Los filtros estarán ocultos y no funcionarán si se utiliza el formulario de búsqueda --}}
                        @if (!isset($_REQUEST['search']))

                            <!-- Ordenar Productos -->
                            {{-- Filtro de Ordenación SIN AJAX (usando HTML <form> y jQuery). Revisa el archivo front/js/custom.js para el script relacionado --}}
                            <form name="sortProducts" id="sortProducts">
                                {{-- Filtro de Ordenación CON AJAX. Revisa ajax_products_listing.blade.php --}}
                                <input type="hidden" name="url" id="url" value="{{ $url }}">

                                <div class="toolbar-sorter">
                                    <div class="select-box-wrapper">
                                        <label class="sr-only" for="sort-by">Ordenar por</label>
                                        <select name="sort" id="sort" class="select-box">
                                            <option value="" selected>Seleccionar</option>
                                            <option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_latest') selected @endif>Ordenar por: Más recientes</option>
                                            <option value="price_lowest" @if(isset($_GET['sort']) && $_GET['sort'] == 'price_lowest') selected @endif>Ordenar por: Precio más bajo</option>
                                            <option value="price_highest" @if(isset($_GET['sort']) && $_GET['sort'] == 'price_highest') selected @endif>Ordenar por: Precio más alto</option>
                                            <option value="name_a_z" @if(isset($_GET['sort']) && $_GET['sort'] == 'name_a_z') selected @endif>Ordenar por: Nombre A - Z</option>
                                            <option value="name_z_a" @if(isset($_GET['sort']) && $_GET['sort'] == 'name_z_a') selected @endif>Ordenar por: Nombre Z - A</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <!-- Fin de Ordenar Productos -->

                        @endif

                        <!-- Mostrar Registros por Página -->
                        <div class="toolbar-sorter-2">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="show-records">Mostrar Registros por Página</label>
                                <select class="select-box" id="show-records">
                                    <option selected="selected" value="">Mostrando: {{ count($categoryProducts) }}</option>
                                    <option value="">Mostrando: Todos</option>
                                </select>
                            </div>
                        </div>
                        <!-- Fin de Mostrar Registros por Página -->

                    </div>
                    <!-- Barra de Página /- -->

                    <!-- Contenedor de Productos -->
                    <div class="filter_products">
                        @include('front.products.ajax_products_listing')
                    </div>
                    <!-- Contenedor de Productos /- -->

                    {{-- Paginación de Laravel usando Bootstrap --}}
                    @if (!isset($_REQUEST['search']))
                        @if (isset($_GET['sort']))
                            <div>
                                {{ $categoryProducts->appends(['sort' => $_GET['sort']])->links() }}
                            </div>
                        @else
                            <div>
                                {{ $categoryProducts->links() }}
                            </div>
                        @endif
                    @endif

                    <div>&nbsp;</div>

                    {{-- Mostrar la descripción de la categoría y subcategoría --}}
                    <div>{{ $categoryDetails['categoryDetails']['description'] }}</div>

                </div>
                <!-- Contenedor Derecho de la Tienda /- -->

            </div>
        </div>
    </div>
    <!-- Página de la Tienda /- -->
@endsection
