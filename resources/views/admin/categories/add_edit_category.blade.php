@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">Categorías</h4>
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

                            {{-- Nuestro código de error de Bootstrap en caso de que la contraseña actual sea incorrecta o que la nueva contraseña y la confirmación no coincidan: --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            @if (Session::has('error_message')) <!-- Verifica el método updateAdminPassword() en AdminController.php -->
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
                            @if (Session::has('success_message')) <!-- Verifica el método updateAdminPassword() en AdminController.php -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form class="forms-sample" @if (empty($category['id'])) action="{{ url('admin/add-edit-category') }}" @else action="{{ url('admin/add-edit-category/' . $category['id']) }}" @endif method="post" enctype="multipart/form-data"> 
                                @csrf  <!-- Si el id no se pasa desde la ruta, esto significa 'Agregar una nueva categoría', pero si el id se pasa desde la ruta, esto significa 'Editar la categoría' --> 
                                <!-- Usando enctype="multipart/form-data" para permitir la subida de archivos (imágenes) -->
                                <div class="form-group">
                                    <label for="category_name">Nombre de la Categoría</label>
                                    <input type="text" class="form-control" id="category_name" placeholder="Ingrese el Nombre de la Categoría" name="category_name" @if (!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name') }}" @endif> 
                                </div>

                                <div class="form-group">
                                    <label for="section_id">Seleccionar Sección</label>
                                    <select name="section_id" id="section_id" class="form-control" style="color: #000">
                                        <option value="">Seleccionar Sección</option>
                                        @foreach ($getSections as $section)
                                            <option value="{{ $section['id'] }}" @if (!empty($category['section_id']) && $category['section_id'] == $section['id']) selected @endif >{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="appendCategoriesLevel"> {{-- Creamos este <div> en un archivo separado para que el método appendCategoryLevel() dentro del CategoryController pueda devolver todo el archivo como respuesta a la llamada AJAX en admin/js/custom.js para mostrar las categorías relevantes en el <select> dependiendo de la sección elegida --}}
                                    @include('admin.categories.append_categories_level')
                                </div>

                                <div class="form-group">
                                    <label for="category_image">Imagen de la Categoría</label>
                                    <input type="file" class="form-control" id="category_image" name="category_image">
                                    {{-- Mostrar la imagen del administrador si existe --}}
                                    <a target="_blank" href="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}">Ver Imagen</a> <!-- Usamos target="_blank" para abrir la imagen en otra página --> 
                                    <input type="hidden" name="current_category_image" value="{{ Auth::guard('admin')->user()->image }}"> <!-- para enviar la URL de la imagen actual del administrador en todas las solicitudes --> 

                                    {{-- Mostrar la imagen de la categoría, si existe --}}
                                    @if (!empty($category['category_image']))
                                        <a target="_blank" href="{{ url('front/images/category_images/' . $category['category_image']) }}">Ver Imagen de la Categoría</a>&nbsp;|&nbsp;
                                        <a href="JavaScript:void(0)" class="confirmDelete" module="category-image" moduleid="{{ $category['id'] }}">Eliminar Imagen de la Categoría</a> {{-- Eliminar la imagen de la categoría del SERVIDOR (SISTEMA DE ARCHIVOS) y de la BASE DE DATOS --}}
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="category_discount">Descuento de la Categoría</label>
                                    <input type="text" class="form-control" id="category_discount" placeholder="Ingrese el Descuento de la Categoría" name="category_discount" @if (!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif > 
                                </div>
                                <div class="form-group">
                                    <label for="description">Descripción de la Categoría</label>
                                    <textarea name="description" id="description" class="form-control" rows="3">{{ $category['description'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="url">URL de la Categoría</label>
                                    <input type="text" class="form-control" id="url" placeholder="Ingrese la URL de la Categoría" name="url" @if (!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url') }}" @endif > 
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">Meta Título</label>
                                    <input type="text" class="form-control" id="meta_title" placeholder="Ingrese el Meta Título" name="meta_title" @if (!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif > 
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Descripción</label>
                                    <input type="text" class="form-control" id="meta_description" placeholder="Ingrese la Meta Descripción" name="meta_description" @if (!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif > 
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Palabras Clave</label>
                                    <input type="text" class="form-control" id="meta_keywords" placeholder="Ingrese las Meta Palabras Clave" name="meta_keywords" @if (!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif > 
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button type="reset" class="btn btn-light">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection