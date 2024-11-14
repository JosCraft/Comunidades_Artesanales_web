@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Secciones</h4>

                            <a href="{{ url('admin/add-edit-section') }}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-primary">Agregar Sección</a>

                            {{-- Mostrando los errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}
                            {{-- Determinando si un ítem existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña de administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Verifica el método updateAdminPassword() en AdminController.php -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="sections" class="table table-bordered"> {{-- usando el id aquí para el DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                            <tr>
                                                <td>{{ $section['id'] }}</td>
                                                <td>{{ $section['name'] }}</td>
                                                <td>
                                                    @if ($section['status'] == 1)
                                                        <a class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id="{{ $section['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Iconos de Skydash Admin Panel Template --}}
                                                        </a>
                                                    @else {{-- si el estado del administrador es inactivo --}}
                                                        <a class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id="{{ $section['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Iconos de Skydash Admin Panel Template --}}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-section/' . $section['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> {{-- Iconos de Skydash Admin Panel Template --}}
                                                    </a>

                                                    {{-- Confirmación de eliminación con alerta JS y Sweet Alert --}}
                                                    {{-- <a title="Sección" class="confirmDelete" href="{{ url('admin/delete-section/' . $section['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Iconos de Skydash Admin Panel Template --}}
                                                    {{-- </a> --}}
                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="section" moduleid="{{ $section['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> {{-- Iconos de Skydash Admin Panel Template --}}
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
        <!-- Fin del contenido -->
        <!-- parcial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- parcial -->
    </div>
@endsection
