@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">Imágenes</h4> {{-- Esto significa imágenes de productos --}}
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Hoy (10 de enero de 2021)
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
                            <h4 class="card-title">Agregar Imágenes</h4>

                            {{-- Código de error de Bootstrap en caso de que la contraseña actual sea incorrecta o que las contraseñas nueva y confirmada no coincidan: --}}
                            {{-- Determinar si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            @if (Session::has('error_message')) <!-- Revisa AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Mostrar errores de validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
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

                            {{-- Mostrar los errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinar si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Mensaje de éxito en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Revisa AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form class="forms-sample" action="{{ url('admin/add-images/' . $product['id']) }}" method="post" enctype="multipart/form-data"> {{-- El atributo "enctype" debe usarse porque estamos subiendo archivos --}}
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
                                        <img style="width: 120px" src="{{ url('front/images/product_images/small/' . $product['product_image']) }}"> {{-- Imagen en tamaño pequeño --}}
                                    @else
                                        <img style="width: 120px" src="{{ url('front/images/product_images/small/no-image.png') }}"> {{-- Imagen en tamaño pequeño --}}
                                    @endif
                                </div>

                                {{-- Añadir y eliminar campos dinámicamente usando jQuery: https://www.codexworld.com/add-remove-input-fields-dynamically-using-jquery/ --}} 
                                {{-- Añadir/eliminar campos de atributos del producto dinámicamente usando jQuery --}}
                                <div class="form-group">
                                    <div class="field_wrapper">
                                        <input type="file" name="images[]" multiple id="images"> {{-- Subir múltiples imágenes para el producto --}} {{-- Atributo HTML "multiple": https://www.w3schools.com/tags/att_multiple.asp --}}
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button type="reset" class="btn btn-light">Cancelar</button>
                            </form>

                            <br><br>
                            
                            <h4 class="card-title">Imágenes del Producto</h4>

                            {{-- DataTable --}}
                            <table id="products" class="table table-bordered"> {{-- usando el id aquí para DataTable --}}
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product['images'] as $image) {{-- usando la relación 'images' --}}
                                        <tr>
                                            <td>{{ $image['id'] }}</td>
                                            <td>
                                                <img src="{{ url('front/images/product_images/small/' . $image['image']) }}"> {{-- Tamaño pequeño --}}
                                            </td>
                                            <td>
                                                @if ($image['status'] == 1)
                                                    <a class="updateImageStatus" id="image-{{ $image['id'] }}" image_id="{{ $image['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Revisa admin/js/custom.js --}}
                                                        <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Iconos del Skydash Admin Panel Template --}}
                                                    </a>
                                                @else {{-- si el estado del administrador es inactivo --}}
                                                    <a class="updateImageStatus" id="image-{{ $image['id'] }}" image_id="{{ $image['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Revisa admin/js/custom.js --}}
                                                        <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Iconos del Skydash Admin Panel Template --}}
                                                    </a>
                                                @endif
                                                &nbsp;
                                                <a href="JavaScript:void(0)" class="confirmDelete" module="image" moduleid="{{ $image['id'] }}"> {{-- Revisa admin/js/custom.js y web.php (rutas) --}}
                                                    <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> {{-- Iconos del Skydash Admin Panel Template --}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
