{{-- Esta página es renderizada por el método addAttributes() en Admin/ProductsController.php --}}

@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">Atributos</h4> {{-- Significa Atributos del Producto --}}
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Hoy (10 Ene 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">Enero - Marzo</a>
                                        <a class="dropdown-item" href="#">Marzo - Junio</a>
                                        <a class="dropdown-item" href="#">Junio - Agosto</a>
                                        <a class="dropdown-item" href="#">Agosto - Noviembre</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Agregar Atributos</h4>

                            {{-- Código de error de Bootstrap en caso de que la contraseña actual sea incorrecta o las contraseñas no coincidan: --}}
                            {{-- Verificación si un ítem existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            @if (Session::has('error_message')) <!-- Ver AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Mostrando Errores de Validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Mostrando mensajes de éxito con Bootstrap en caso de éxito al actualizar la contraseña: --}}
                            @if (Session::has('success_message')) <!-- Ver AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form class="forms-sample" action="{{ url('admin/add-edit-attributes/' . $product['id']) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="product_name">Nombre del Producto:</label>
                                    &nbsp; {{ $product['product_name'] }}
                                </div>
                                <div class="form-group">
                                    <label for="product_code">Código del Producto:</label>
                                    &nbsp; {{ $product['product_code'] }}
                                </div>
                                <div class="form-group">
                                    <label for="product_color">Color del Producto:</label>
                                    &nbsp; {{ $product['product_color'] }}
                                </div>
                                <div class="form-group">
                                    <label for="product_price">Precio del Producto:</label>
                                    &nbsp; {{ $product['product_price'] }}
                                </div>
                                <div class="form-group">
                                    {{-- Mostrar la imagen del producto, si existe --}}
                                    @if (!empty($product['product_image']))
                                        <img style="width: 120px" src="{{ url('front/images/product_images/small/' . $product['product_image']) }}"> {{-- Imagen 'pequeña' --}}
                                    @else
                                        <img style="width: 120px" src="{{ url('front/images/product_images/small/no-image.png') }}"> {{-- Imagen 'pequeña' predeterminada --}}
                                    @endif
                                </div>

                                {{-- Añadir/Quitar campos dinámicamente usando jQuery --}}
                                <div class="form-group">
                                    <div class="field_wrapper">
                                        <div>
                                            <input type="text" name="size[]" placeholder="Tamaño" style="width:100px" required>
                                            <input type="text" name="sku[]" placeholder="SKU" style="width:100px" required>
                                            <input type="text" name="price[]" placeholder="Precio" style="width:100px" required>
                                            <input type="text" name="stock[]" placeholder="Stock" style="width:100px" required>
                                            <a href="javascript:void(0);" class="add_button" title="Añadir Atributos">Añadir</a> {{-- Añadir otros 4 campos de entrada como los anteriores --}}
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button type="reset" class="btn btn-light">Cancelar</button>
                            </form>

                            <br><br>

                            <h4 class="card-title">Atributos del Producto</h4>

                            <form method="post" action="{{ url('admin/edit-attributes/' . $product['id']) }}">
                                @csrf

                                {{-- Tabla de Datos --}}
                                <table id="products" class="table table-bordered"> {{-- Usando el id aquí para DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tamaño</th>
                                            <th>SKU</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product['attributes'] as $attribute) {{-- Usando la relación 'attributes' --}}
                                            <input style="display: none" type="text" name="attributeId[]" value="{{ $attribute['id'] }}">
                                            <tr>
                                                <td>{{ $attribute['id'] }}</td>
                                                <td>{{ $attribute['size'] }}</td>
                                                <td>{{ $attribute['sku'] }}</td>
                                                <td>
                                                    <input type="number" name="price[]" value="{{ $attribute['price'] }}" required style="width: 60px">
                                                </td>
                                                <td>
                                                    <input type="number" name="stock[]" value="{{ $attribute['stock'] }}" required style="width: 60px">
                                                </td>
                                                <td>
                                                    @if ($attribute['status'] == 1)
                                                        <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i>
                                                        </a>
                                                    @else
                                                        <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Actualizar Atributos</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper termina -->
        @include('admin.layout.footer')
        <!-- parcial -->
    </div>
@endsection
