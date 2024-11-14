@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Categorías</h4>

                            <a href="{{ url('admin/add-edit-category') }}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-primary">Agregar Categoría</a>

                            {{-- Mostrando los errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Ver AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="categories" class="table table-bordered"> {{-- utilizando el id aquí para el DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre de la Categoría</th>
                                            <th>Categoría Padre</th> {{-- A través de la relación --}}
                                            <th>Sección Padre</th> {{-- A través de la relación --}}
                                            <th>URL</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            {{-- @php echo '<pre>', var_dump($category['parent_category']), '</pre>'; @endphp --}}
                                            @if (isset($category['parent_category']['category_name']) && !empty($category['parent_category']['category_name']))
                                                @php $parent_category = $category['parent_category']['category_name']; @endphp
                                            @else
                                                @php $parent_category = 'Raíz'; @endphp
                                            @endif
                                            <tr>
                                                <td>{{ $category['id'] }}</td>
                                                <td>{{ $category['category_name'] }}</td>
                                                <td>{{ $parent_category }}</td> {{-- A través de la relación --}}
                                                <td>{{ $category['section']['name'] }}</td> {{-- A través de la relación --}}
                                                <td>{{ $category['url'] }}</td>
                                                <td>
                                                    @if ($category['status'] == 1)
                                                        <a class="updateCategoryStatus" id="category-{{ $category['id'] }}" category_id="{{ $category['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Íconos del Panel de Administración Skydash --}}
                                                        </a>
                                                    @else {{-- si el estado del administrador es inactivo --}}
                                                        <a class="updateCategoryStatus" id="category-{{ $category['id'] }}" category_id="{{ $category['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Íconos del Panel de Administración Skydash --}}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-category/' . $category['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> {{-- Íconos del Panel de Administración Skydash --}}
                                                    </a>

                                                    {{-- Confirmar alerta de eliminación JS y Sweet Alert --}}
                                                    {{-- <a title="Categoría" class="confirmDelete" href="{{ url('admin/delete-category/' . $category['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Íconos del Panel de Administración Skydash --}}
                                                    {{-- </a> --}}
                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="category" moduleid="{{ $category['id'] }}"> {{-- Ver admin/js/custom.js y web.php (rutas) --}}
                                                        <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> {{-- Íconos del Panel de Administración Skydash --}}
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
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection