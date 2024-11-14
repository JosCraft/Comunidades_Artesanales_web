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
                            <h4 class="card-title">Actualizar Detalles del Administrador</h4>

                            {{-- Código de error de Bootstrap en caso de que la contraseña actual sea incorrecta o si la nueva contraseña y su confirmación no coinciden: --}}
                            {{-- Determinar si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            @if (Session::has('error_message')) <!-- Verificar AdminController.php, método updateAdminPassword() -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
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
                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {{-- Mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Verificar AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form class="forms-sample" action="{{ url('admin/update-admin-details') }}" method="post" enctype="multipart/form-data"> @csrf <!-- Usamos enctype="multipart/form-data" para permitir la carga de archivos (imágenes) -->
                                <div class="form-group">
                                    <label>Nombre de Usuario/Correo del Administrador</label>
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly> <!-- Verificar método updateAdminPassword() en AdminController.php --> {{-- Accediendo a instancias específicas de guard: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                </div>
                                <div class="form-group">
                                    <label>Tipo de Administrador</label>
                                    <input class="form-control" value="{{ Auth::guard('admin')->user()->type }}" readonly> {{-- Accediendo a instancias específicas de guard: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                </div>
                                <div class="form-group">
                                    <label for="admin_name">Nombre</label>
                                    <input type="text" class="form-control" id="admin_name" placeholder="Ingrese su Nombre" name="admin_name" value="{{ Auth::guard('admin')->user()->name }}"> {{-- Accediendo a instancias específicas de guard: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                </div>
                                <div class="form-group">
                                    <label for="admin_mobile">Teléfono Móvil</label>
                                    <input type="text" class="form-control" id="admin_mobile" placeholder="Ingrese un número de teléfono de 10 dígitos" name="admin_mobile" value="{{ Auth::guard('admin')->user()->mobile }}" maxlength="10" minlength="10"> {{-- Accediendo a instancias específicas de guard: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                </div>
                                <div class="form-group">
                                    <label for="admin_image">Foto del Administrador</label>
                                    <input type="file" class="form-control" id="admin_image" name="admin_image">
                                    {{-- Mostrar la imagen del administrador si existe --}}
                                    @if (!empty(Auth::guard('admin')->user()->image)) {{-- Accediendo a instancias específicas de guard: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                        <a target="_blank" href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">Ver Imagen</a> <!-- Usamos    target="_blank"    para abrir la imagen en una página aparte --> {{-- Accediendo a instancias específicas de guard: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                        <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}"> <!-- Enviamos la URL de la imagen actual del administrador en cada solicitud --> {{-- Accediendo a instancias específicas de guard: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
                                    @endif
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
