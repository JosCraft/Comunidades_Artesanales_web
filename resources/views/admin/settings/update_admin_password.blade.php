@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Configuración del Administrador</h3>
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

                            {{-- Código de error de Bootstrap en caso de contraseña actual incorrecta o si la nueva contraseña y su confirmación no coinciden: --}}
                            {{-- Determinar si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            @if (Session::has('error_message')) <!-- Verificar AdminController.php, método updateAdminPassword() -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {{-- Mostrar errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinar si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Mensaje de éxito de Bootstrap en caso de que se actualice la contraseña del administrador correctamente: --}}
                            @if (Session::has('success_message')) <!-- Verificar AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <h4 class="card-title">Actualizar Contraseña del Administrador</h4>

                            <form class="forms-sample" action="{{ url('admin/update-admin-password') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label>Nombre de Usuario/Correo del Administrador</label>
                                    <input class="form-control" value="{{ $adminDetails['email'] }}" readonly> <!-- Verificar método updateAdminPassword() en AdminController.php -->
                                </div>
                                <div class="form-group">
                                    <label>Tipo de Administrador</label>
                                    <input class="form-control" value="{{ $adminDetails['type'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current_password">Contraseña Actual</label>
                                    <input type="password" class="form-control" id="current_password" placeholder="Introduce la Contraseña Actual" name="current_password" required>
                                    <span id="check_password"></span> <!-- Lo utilizaremos en la llamada AJAX en admin/js/custom.js para mostrar si la contraseña es correcta o no -->
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Nueva Contraseña</label>
                                    <input type="password" class="form-control" id="new_password" placeholder="Introduce la Nueva Contraseña" name="new_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirma la Contraseña" name="confirm_password" required>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button type="reset"  class="btn btn-light">Cancelar</button>
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
