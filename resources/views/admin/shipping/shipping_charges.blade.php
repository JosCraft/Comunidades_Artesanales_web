{{-- Este archivo es renderizado por el método shippingCharges() en Admin/ShippingController.php --}}
@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cargos de Envío</h4>

                            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un ítem existe en la Sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
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
                                <table id="shipping" class="table table-bordered"> {{-- usando el id aquí para la DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>País</th>
                                            <th>Tasa (0g a 500g)</th>
                                            <th>Tasa (501g a 1000g)</th>
                                            <th>Tasa (1001g a 2000g)</th>
                                            <th>Tasa (2001g a 5000g)</th>
                                            <th>Tasa (Más de 5000g)</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($shippingCharges as $shipping)
                                            <tr>
                                                <td>{{ $shipping['id'] }}</td>
                                                <td>{{ $shipping['country'] }}</td>
                                                <td>{{ $shipping['0_500g'] }}</td>
                                                <td>{{ $shipping['501g_1000g'] }}</td>
                                                <td>{{ $shipping['1001_2000g'] }}</td>
                                                <td>{{ $shipping['2001g_5000g'] }}</td>
                                                <td>{{ $shipping['above_5000g'] }}</td>
                                                <td>
                                                    @if ($shipping['status'] == 1)
                                                        <a class="updateShippingStatus" id="shipping-{{ $shipping['id'] }}" shipping_id="{{ $shipping['id'] }}" href="javascript:void(0)"> {{-- Usando Atributos HTML Personalizados. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Iconos del Plantilla del Panel de Administración Skydash --}}
                                                        </a>
                                                    @else {{-- si el estado del administrador es inactivo --}}
                                                        <a class="updateShippingStatus" id="shipping-{{ $shipping['id'] }}" shipping_id="{{ $shipping['id'] }}" href="javascript:void(0)"> {{-- Usando Atributos HTML Personalizados. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Iconos del Plantilla del Panel de Administración Skydash --}}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/edit-shipping-charges/' . $shipping['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> {{-- Iconos del Plantilla del Panel de Administración Skydash --}}
                                                    </a>

                                                    {{-- Confirmar alerta de eliminación de JS y Sweet Alert --}}
                                                    {{-- <a title="Envío" class="confirmDelete" href="{{ url('admin/delete-shipping/' . $shipping['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Iconos del Plantilla del Panel de Administración Skydash --}}
                                                    {{-- </a> --}}
                                                    {{-- <a href="JavaScript:void(0)" class="confirmDelete" module="shipping" moduleid="{{ $shipping['id'] }}"> --}}
                                                        {{--  <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Iconos del Plantilla del Panel de Administración Skydash --}}
                                                    {{-- </a> --}}
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
        <!-- content-wrapper termina -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
