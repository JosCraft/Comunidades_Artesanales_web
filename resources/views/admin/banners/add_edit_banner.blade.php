@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">Banners de la Página Principal</h4>
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

                            {{-- Nuestro código de error de Bootstrap en caso de que la contraseña actual sea incorrecta o las contraseñas nueva y confirmación no coincidan: --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            @if (Session::has('error_message')) <!-- Verificar en AdminController.php, método updateAdminPassword() -->
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
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Verificar en AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form class="forms-sample" @if (empty($banner['id'])) action="{{ url('admin/add-edit-banner') }}" @else action="{{ url('admin/add-edit-banner/' . $banner['id']) }}" @endif method="post" enctype="multipart/form-data"> <!-- Si el id no se pasa desde la ruta, esto significa 'Agregar un nuevo Banner', pero si se pasa el id desde la ruta, esto significa 'Editar el Banner' --> <!-- Usando enctype="multipart/form-data" para permitir la carga de archivos (imágenes) -->
                                @csrf

                                <div class="form-group"> 
                                    <label for="type">Tipo de Banner</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="">Seleccionar</option>
                                        <option @if (!empty($banner['type']) && $banner['type'] == 'Slider') selected @endif value="Slider">Slider</option>
                                        <option @if (!empty($banner['type']) && $banner['type'] == 'Fix') selected @endif value="Fix">Fijo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Imagen del Banner</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    {{-- Mostrar la imagen del administrador si existe --}}
                                        <a target="_blank" href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">Ver Imagen</a> {{-- Accediendo a instancias de guardas específicas: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}} <!-- Usamos target="_blank" para abrir la imagen en otra página separada -->
                                        <input type="hidden" name="current_banner_image" value="{{ Auth::guard('admin')->user()->image }}"> <!-- para enviar la URL actual de la imagen del administrador todo el tiempo con todas las solicitudes --> {{-- Accediendo a instancias de guardas específicas: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}

                                    {{-- Mostrar la imagen del banner, si existe --}}
                                    @if (!empty($banner['image']))
                                        <a target="_blank" href="{{ url('front/images/banner_images/' . $banner['image']) }}">Ver Imagen del Banner</a>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="link">Enlace del Banner</label>
                                    <input type="text" class="form-control" id="link" placeholder="Ingresar Enlace del Banner" name="link" @if (!empty($banner['link'])) value="{{ $banner['link'] }}" @else value="{{ old('link') }}" @endif> 
                                </div>
                                <div class="form-group">
                                    <label for="title">Título del Banner</label>
                                    <input type="text" class="form-control" id="title" placeholder="Ingresar Título del Banner" name="title" @if (!empty($banner['title'])) value="{{ $banner['title'] }}" @else value="{{ old('title') }}" @endif> 
                                </div>
                                <div class="form-group">
                                    <label for="alt">Texto Alternativo del Banner (Alt para SEO)</label>
                                    <input type="text" class="form-control" id="alt" placeholder="Ingresar Texto Alternativo del Banner" name="alt" @if (!empty($banner['alt'])) value="{{ $banner['alt'] }}" @else value="{{ old('alt') }}" @endif> 
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button type="reset" class="btn btn-light">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del contenido -->

        @include('admin.layout.footer')
        <!-- parcial -->

    </div>
@endsection
