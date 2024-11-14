{{-- Esta página (vista) se renderiza desde el método subscribers() en Admin/NewsletterController.php --}}

@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Suscriptores</h4>
                            
                            {{-- Botón para exportar suscriptores (la tabla de base de datos `newsletter_subscribers`) como un archivo de Excel --}} 
                            <a href="{{ url('admin/export-subscribers') }}" style="max-width: 100px; float: right" class="btn btn-block btn-primary">Exportar</a>

                            {{-- Mostrando los errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un ítem existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
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
                                <table id="subscribers" class="table table-bordered"> {{-- usando el ID aquí para el DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Correo Electrónico</th>
                                            <th>Suscrito el</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($subscribers as $subscriber)
                                            <tr>
                                                <td>{{ $subscriber['id'] }}</td>
                                                <td>{{ $subscriber['email'] }}</td>
                                                <td>
                                                    {{ date("j de F, Y, g:i a", strtotime($subscriber['created_at'])) }} {{-- https://stackoverflow.com/questions/2487921/convert-a-date-format-in-php --}}
                                                </td>
                                                <td>
                                                    @if ($subscriber['status'] == 1)
                                                        <a class="updateSubscriberStatus" id="subscriber-{{ $subscriber['id'] }}" subscriber_id="{{ $subscriber['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Íconos de la plantilla del panel de administración Skydash --}}
                                                        </a>
                                                    @else {{-- si el estado del administrador es inactivo --}}
                                                        <a class="updateSubscriberStatus" id="subscriber-{{ $subscriber['id'] }}" subscriber_id="{{ $subscriber['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Íconos de la plantilla del panel de administración Skydash --}}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- <a href="{{ url('admin/edit-shipping-charges/' . $shipping['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> --}} {{-- Íconos de la plantilla del panel de administración Skydash --}}
                                                    {{-- </a> --}}

                                                    {{-- Confirmar alerta de eliminación JS y Sweet Alert --}}
                                                    {{-- <a title="Shipping" class="confirmDelete" href="{{ url('admin/delete-shipping/' . $shipping['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Íconos de la plantilla del panel de administración Skydash --}}
                                                    {{-- </a> --}}

                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="subscriber" moduleid="{{ $subscriber['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> {{-- Íconos de la plantilla del panel de administración Skydash --}}
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
        <!-- fin de content-wrapper -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
