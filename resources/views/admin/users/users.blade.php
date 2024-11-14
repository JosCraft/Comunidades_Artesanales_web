{{-- Esta vista es renderizada por el método users() en Admin/UserController.php --}}
@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Usuarios</h4>

                            {{-- Mostrando los errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
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
                                <table id="users" class="table table-bordered"> {{-- usando el id aquí para el DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Dirección</th>
                                            <th>Ciudad</th>
                                            <th>Estado</th>
                                            <th>País</th>
                                            <th>Código Postal</th>
                                            <th>Móvil</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user['id'] }}</td>
                                                <td>{{ $user['name'] }}</td>
                                                <td>{{ $user['address'] }}</td>
                                                <td>{{ $user['city'] }}</td>
                                                <td>{{ $user['state'] }}</td>
                                                <td>{{ $user['country'] }}</td>
                                                <td>{{ $user['pincode'] }}</td>
                                                <td>{{ $user['mobile'] }}</td>
                                                <td>{{ $user['email'] }}</td>
                                                <td>
                                                    @if ($user['status'] == 1)
                                                        <a class="updateUserStatus" id="user-{{ $user['id'] }}" user_id="{{ $user['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Íconos de la plantilla del panel de administración Skydash --}}
                                                        </a>
                                                    @else {{-- si el estado del usuario es inactivo --}}
                                                        <a class="updateUserStatus" id="user-{{ $user['id'] }}" user_id="{{ $user['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados de HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Íconos de la plantilla del panel de administración Skydash --}}
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
        <!-- El contenido finaliza -->
        <!-- parcial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- parcial -->
    </div>
@endsection
