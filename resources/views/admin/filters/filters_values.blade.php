@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filtros</h4>

                            <a href="{{ url('admin/filters') }}" style="max-width: 163px; float: right; display: inline-block" class="btn btn-block btn-primary">Ver Filtros</a>
                            <a href="{{ url('admin/add-edit-filter-value') }}" style="max-width: 150px; float: left; display: inline-block" class="btn btn-block btn-primary">Agregar Valor de Filtro</a>

                            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un ítem existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña de administrador sea exitosa: --}}
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
                                <table id="filters" class="table table-bordered"> {{-- usando el id aquí para el DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID de Filtro</th>
                                            <th>Nombre de Filtro</th>
                                            <th>Valor de Filtro</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($filters_values as $filter)
                                            <tr>
                                                <td>{{ $filter['id'] }}</td>
                                                <td>{{ $filter['filter_id'] }}</td>
                                                <td>
                                                    @php
                                                        echo $getFilterName = \App\Models\ProductsFilter::getFilterName($filter['filter_id']);
                                                    @endphp
                                                </td>
                                                <td>{{ $filter['filter_value'] }}</td>
                                                <td>
                                                    @if ($filter['status'] == 1)
                                                        <a class="updateFilterValueStatus" id="filter-{{ $filter['id'] }}" filter_id="{{ $filter['id'] }}" href="javascript:void(0)"> {{-- Usando Atributos Personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Iconos del Plantilla de Panel de Administración Skydash --}}
                                                        </a>
                                                    @else {{-- si el estado del administrador es inactivo --}}
                                                        <a class="updateFilterValueStatus" id="filter-{{ $filter['id'] }}" filter_id="{{ $filter['id'] }}" href="javascript:void(0)"> {{-- Usando Atributos Personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Iconos del Plantilla de Panel de Administración Skydash --}}
                                                        </a>
                                                    @endif
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
        <!-- El contenido termina aquí -->
        <!-- parcial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- parcial -->
    </div>
@endsection
