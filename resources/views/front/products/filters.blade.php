{{-- Esta es la barra lateral de filtros que es incluida por 'listing.blade.php' --}}
@php
    $productFilters = \App\Models\ProductsFilter::productFilters(); // Obtener todos los filtros habilitados/activos
    // dd($productFilters);
@endphp

<!-- Contenedor de Barra Lateral Izquierda de la Tienda -->
<div class="col-lg-3 col-md-3 col-sm-12">
    <!-- Obtener Categorías desde la Categoría Raíz -->
    <div class="fetch-categories">
        <h3 class="title-name">Explorar categorías</h3>
        <!-- Nivel 1 -->
        <!-- Ejemplo de Categorías si fueran estáticas
        <h3 class="fetch-mark-category">
            <a href="listing.html">Camisetas
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">Camisetas casuales
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">Camisetas formales
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>
        -->
    </div>
    <!-- Fin de Obtener Categorías desde la Categoría Raíz -->

    {{-- Si el formulario de búsqueda no se utiliza en front/layout/header.blade.php. Nota: Los filtros se ocultarán y no funcionarán si se utiliza el formulario de búsqueda --}}
    @if (!isset($_REQUEST['search']))

        <!-- Filtros -->
        <!-- Filtro por Talla -->
        @php
            $getSizes = \App\Models\ProductsFilter::getSizes($url); // Obtener las tallas de productos según la URL
            // dd($getSizes);
        @endphp

        <div class="facet-filter-associates">
            <h3 class="title-name">Talla</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getSizes as $key => $size)
                        <input type="checkbox" class="check-box size" id="size{{ $key }}" name="size[]" value="{{ $size }}">
                        <label class="label-text" for="size{{ $key }}">{{ $size }}</label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- Filtro por Talla -->

        <!-- Filtro por Color -->
        @php
            $getColors = \App\Models\ProductsFilter::getColors($url); // Obtener los colores según la URL
        @endphp
        <div class="facet-filter-associates">
            <h3 class="title-name">Color</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getColors as $key => $color)
                        <input type="checkbox" class="check-box color" id="color{{ $key }}" name="color[]" value="{{ $color }}">
                        <label class="label-text" for="color{{ $key }}">{{ $color }}</label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- Filtro por Color -->

        <!-- Filtro por Marca -->
        @php
            $getBrands = \App\Models\ProductsFilter::getBrands($url); // Obtener las marcas según la URL
        @endphp
        <div class="facet-filter-associates">
            <h3 class="title-name">Marca</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getBrands as $key => $brand)
                        <input type="checkbox" class="check-box brand" id="brand{{ $key }}" name="brand[]" value="{{ $brand['id'] }}">
                        <label class="label-text" for="brand{{ $key }}">{{ $brand['name'] }}</label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- Filtro por Marca -->

        <!-- Filtro por Precio -->
        <div class="facet-filter-associates">
            <h3 class="title-name">Precio</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @php
                        $prices = array('0-1000', '1000-2000', '2000-5000', '5000-10000', '10000-100000');
                    @endphp
                    @foreach ($prices as $key => $price)
                        <input type="checkbox" class="check-box price" id="price{{ $key }}" name="price[]" value="{{ $price }}">
                        <label class="label-text" for="price{{ $key }}">Bs. {{ $price }}</label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- Filtro por Precio -->

        {{-- Filtros Dinámicos --}}
        @foreach ($productFilters as $filter)
            @php
                $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $categoryDetails['categoryDetails']['id']);
            @endphp
            @if ($filterAvailable == 'Yes')
                @if (count($filter['filter_values']) > 0)
                    <div class="facet-filter-associates">
                        <h3 class="title-name">{{ $filter['filter_name'] }}</h3>
                        <form class="facet-form" action="#" method="post">
                            <div class="associate-wrapper">
                                @foreach ($filter['filter_values'] as $value)
                                    <input type="checkbox" class="check-box {{ $filter['filter_column'] }}" id="{{ $value['filter_value'] }}" name="{{ $filter['filter_column'] }}[]" value="{{ $value['filter_value'] }}">
                                    <label class="label-text" for="{{ $value['filter_value'] }}">{{ ucwords($value['filter_value']) }}</label>
                                @endforeach
                            </div>
                        </form>
                    </div>
                @endif
            @endif
        @endforeach
        <!-- Filtros Dinámicos -->

    @endif

</div>
<!-- Contenedor de Barra Lateral Izquierda de la Tienda /- -->
