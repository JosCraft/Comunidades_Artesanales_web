{{-- Esta página es incluida por la página add_edit_product.php para mostrar la caja <select> de filtros relacionados para el producto recién agregado, DEPENDIENDO DE LA CATEGORÍA SELECCIONADA del producto --}}

@php
    $productFilters = \App\Models\ProductsFilter::productFilters(); // Obtener TODOS los Filtros (habilitados/activos)
    // dd($productFilters);

    // Nota: $category_id puede venir de DOS lugares: la llamada AJAX y se pasa a través del método categoryFilters() en Admin/FilterController.php O el objeto $product en caso de 'Editar Producto' del método addEditProduct() en Admin/ProductsController    

    // En caso de 'Editar un Producto' solamente (NO 'Agregar un nuevo Producto' y NO del $category_id que viene de la llamada AJAX), donde $product se pasa del método addEditProduct() en Admin/ProductsController    
    if (isset($product['category_id'])) {
        $category_id = $product['category_id'];
    }
@endphp

@foreach ($productFilters as $filter) {{-- mostrar TODOS los Filtros (habilitados/activos) --}}
    @php
        // echo '<pre>', var_dump($product), '</pre>';
        // exit;
        // echo '<pre>', var_dump($filter), '</pre>';
        // exit;
        // dd($filter);
    @endphp

    @if (isset($category_id)) {{-- que viene de la llamada AJAX (pasada a través del método categoryFilters() en Admin/FilterController.php, y TAMBIÉN puede venir de la condición if anterior aquí (en esta página) en caso de 'Editar Producto' (no 'Agregar un Producto') del método addEditProduct() en Admin/ProductsController --}}
        @php
            // dd($filter);

            // En primer lugar, para cada filtro en la tabla `products_filters`, obtén los `cat_ids` del filtro (del bucle foreach), luego verifica si el id de categoría actual (usando la variable $category_id y dependiendo de la URL) existe en los `cat_ids` del filtro. Si existe, entonces muestra el filtro, si no, entonces no lo muestres.
            $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $category_id); // $category_id viene de la llamada AJAX (ver método categoryFilters() en Admin/FilterController.php)
        @endphp

        @if ($filterAvailable == 'Yes') {{-- si el filtro tiene el current category_id en sus `cat_ids` --}}
            <div class="form-group">
                <label for="{{ $filter['filter_column'] }}">Selecciona {{ $filter['filter_name'] }}</label> {{-- SOLO mostrar los filtros relacionados del producto agregado! (¡NO TODOS LOS FILTROS!) --}}
                <select name="{{ $filter['filter_column'] }}" id="{{ $filter['filter_column'] }}" class="form-control text-dark"> {{-- $filter['filter_column'] es como 'ram' --}}
                    <option value="">Selecciona el Valor del Filtro</option>
                    @foreach ($filter['filter_values'] as $value) {{-- mostrar los valores relacionados del filtro del producto --}}
                        @php
                            // echo '<pre>', var_dump($value), '</pre>'; exit;
                        @endphp
                        <option value="{{ $value['filter_value'] }}" @if (!empty($product[$filter['filter_column']]) && $product[$filter['filter_column']] == $value['filter_value']) selected @endif>{{ ucwords($value['filter_value']) }}</option> {{-- $value['filter_value'] es como '4GB' --}} {{-- $product[$filter['filter_column']] es como $product['screen_size'] que a su vez puede ser igual a '5 a 5.4 in' --}}
                    @endforeach
                </select>
            </div>
        @endif
    @endif
@endforeach
