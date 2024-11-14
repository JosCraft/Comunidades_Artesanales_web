@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cupones</h4>
                            
                            <a href="{{ url('admin/add-edit-coupon') }}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-primary">Agregar Cupón</a>

                            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Verificar AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="coupons" class="table table-bordered"> {{-- usando el id aquí para el DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Código de Cupón</th>
                                            <th>Tipo de Cupón</th>
                                            <th>Monto</th>
                                            <th>Fecha de Expiración</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{ $coupon['id'] }}</td>
                                                <td>{{ $coupon['coupon_code'] }}</td>
                                                <td>{{ $coupon['coupon_type'] }}</td>
                                                <td>
                                                    {{ $coupon['amount'] }}
                                                    @if ($coupon['amount_type'] == 'Percentage')
                                                        %
                                                    @else
                                                        INR
                                                    @endif
                                                </td>
                                                <td>{{ $coupon['expiry_date'] }}</td>
                                                <td>
                                                    @if ($coupon['status'] == 1)
                                                        <a class="updateCouponStatus" id="coupon-{{ $coupon['id'] }}" coupon_id="{{ $coupon['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Iconos del Template de Panel de Administración Skydash --}}
                                                        </a>
                                                    @else {{-- si el estado del administrador está inactivo --}}
                                                        <a class="updateCouponStatus" id="coupon-{{ $coupon['id'] }}" coupon_id="{{ $coupon['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Iconos del Template de Panel de Administración Skydash --}}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-coupon/' . $coupon['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> {{-- Iconos del Template de Panel de Administración Skydash --}}
                                                    </a>

                                                    {{-- Confirmar eliminación, alerta JS y Sweet Alert --}}
                                                    {{-- <a title="Cupón" class="confirmDelete" href="{{ url('admin/delete-coupon/' . $coupon['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Iconos del Template de Panel de Administración Skydash --}}
                                                    {{-- </a> --}}
                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="coupon" moduleid="{{ $coupon['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> {{-- Iconos del Template de Panel de Administración Skydash --}}
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
        <!-- fin del contenido -->
        <!-- parcial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- parcial -->
    </div>
@endsection
