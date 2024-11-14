@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">Valores de Filtro</h4>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Hoy (10 de enero de 2021)
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
                            @if (Session::has('error_message')) <!-- Verificar AdminController.php, método updateAdminPassword() -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {{-- Mostrando errores de validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
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

                            {{-- Mostrando los errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña de administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Verificar AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form class="forms-sample" @if (empty($filter['id'])) action="{{ url('admin/add-edit-filter-value') }}" @else action="{{ url('admin/add-edit-filter-value/' . $filter['id']) }}" @endif method="post" enctype="multipart/form-data"> <!-- Si no se pasa el id desde la ruta, esto significa 'Agregar un nuevo Valor de Filtro', pero si se pasa el id desde la ruta, esto significa 'Editar el Valor de Filtro' --> <!-- Usando enctype="multipart/form-data" para permitir la carga de archivos (imágenes) -->
                                @csrf

                                <div class="form-group">
                                    {{-- Nota: Los filtros dinámicos se aplican a `categorías` (categorías padre y subcategorías (categorías hijas)), ¡y no a `secciones`! --}}
                                    <label for="filter_id">Seleccionar Filtro</label>
                                    <select name="filter_id" id="filter_id" class="form-control text-dark"> {{-- Usamos los corchetes cuadrados [] en name="cat_ids[]" es un array porque usamos el atributo HTML "multiple" para poder elegir múltiples categorías al mismo tiempo --}}
                                        <option value="">Seleccionar Filtro</option>
                                        @foreach ($filters as $filter) {{-- subcategorías o categorías hijas --}} {{-- Verificar FilterController.php --}}
                                            <option value="{{ $filter['id'] }}">{{ $filter['filter_name'] }}</option> {{-- subcategorías o categorías hijas --}}
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="filter_value">Valor de Filtro</label>
                                    <input type="text" class="form-control" id="filter_value" placeholder="Ingrese el Valor de Filtro" name="filter_value" @if (!empty($filter['filter_value'])) value="{{ $filter['filter_value'] }}" @else value="{{ old('filter_value') }}" @endif> {{-- Repoblando Formularios (usando el método old()): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button type="reset" class="btn btn-light">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- el contenido termina -->
        @include('admin.layout.footer')
        <!-- parcial -->
    </div>
@endsection
