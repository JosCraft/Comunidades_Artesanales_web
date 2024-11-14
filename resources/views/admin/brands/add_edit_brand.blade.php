@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h4 class="card-title">Marcas</h4>
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
                            <h4 class="card-title">{{ $title }}</h4>

                            {{-- Nuestro código de error de Bootstrap en caso de que la contraseña actual sea incorrecta o la nueva contraseña y la confirmación no coincidan: --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            @if (Session::has('error_message')) <!-- Verificar el método updateAdminPassword() en AdminController.php -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {{-- Mostrando Errores de Validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{-- <strong>Error:</strong> {{ Session::get('error_message') }} --}}

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Verificar el método updateAdminPassword() en AdminController.php -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form class="forms-sample" @if (empty($brand['id'])) action="{{ url('admin/add-edit-brand') }}" @else action="{{ url('admin/add-edit-brand/' . $brand['id']) }}" @endif method="post" enctype="multipart/form-data"> <!-- Si el id no se pasa desde la ruta, significa 'Agregar una nueva Marca', pero si se pasa el id, significa 'Editar la Marca' --> <!-- Usando enctype="multipart/form-data" para permitir la subida de archivos (imágenes) -->
                                @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                <div class="form-group">
                                    <label for="brand_name">Nombre de la Marca</label>
                                    <input type="text" class="form-control" id="brand_name" placeholder="Ingrese Nombre de la Marca" name="brand_name" @if (!empty($brand['name'])) value="{{ $brand['name'] }}" @else value="{{ old('brand_name') }}" @endif> 
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button type="reset" class="btn btn-light">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin de content-wrapper -->
        @include('admin.layout.footer')
        <!-- parcial -->
    </div>
@endsection
