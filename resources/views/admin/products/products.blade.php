@extends('admin.layout.layout')
<!-- Comunidad_Artesanal\resources\views\admin\products\products.blade.php -->
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Productos</h4>
                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ url('admin/add-edit-product') }}" class="btn btn-primary" style="max-width: 150px;">Agregar Producto</a>
                        </div>

                        <!-- Mensaje de éxito -->
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <!-- Tabla de productos -->
                        <div class="table-responsive pt-3">
                            <table id="products" class="table table-striped table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre del Producto</th>
                                        <th>Código del Producto</th>
                                        <th>Color del Producto</th>
                                        <th>Imagen</th>
                                        <th>Categoría</th>
                                        <th>Sección</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product['id'] }}</td>
                                            <td>{{ $product['product_name'] }}</td>
                                            <td>{{ $product['product_code'] }}</td>
                                            <td>{{ $product['product_color'] }}</td>
                                            <td>
                                                <img style="width:120px; height:100px" src="{{ !empty($product['product_image']) ? asset('front/images/product_images/small/' . $product['product_image']) : asset('front/images/product_images/small/no-image.png') }}">
                                            </td>
                                            <td>{{ $product['category']['category_name'] }}</td>
                                            <td>{{ $product['section']['name'] }}</td>
                                            <td>{{ $product['stock'] }}</td>
                                            <td>
                                                <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)">
                                                    <i style="font-size: 25px" class="mdi {{ $product['status'] == 1 ? 'mdi-bookmark-check' : 'mdi-bookmark-outline' }}" status="{{ $product['status'] == 1 ? 'Activo' : 'Inactivo' }}"></i>
                                                </a>
                                                <a title="Editar Producto" href="{{ url('admin/add-edit-product/' . $product['id']) }}">
                                                    <i style="font-size: 25px" class="mdi mdi-pencil-box"></i>
                                                </a>
                                                <a title="Agregar Atributos" href="{{ url('admin/add-edit-attributes/' . $product['id']) }}">
                                                    <i style="font-size: 25px" class="mdi mdi-plus-box"></i>
                                                </a>
                                                <a title="Agregar Imágenes Múltiples" href="{{ url('admin/add-images/' . $product['id']) }}">
                                                    <i style="font-size: 25px" class="mdi mdi-library-plus"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- Cierre de .table-responsive -->
                    </div> <!-- Cierre de .card-body -->
                </div> <!-- Cierre de .card -->
            </div> <!-- Cierre de .col-lg-12 -->
        </div> <!-- Cierre de .row -->
    </div> <!-- Cierre de .content-wrapper -->
</div> <!-- Cierre de .main-panel -->
@endsection
