{{-- Este archivo es renderizado por el método editShippingCharges() en Admin/ShippingController.php --}}
@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Editar Cargos de Envío</h3>
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
                            @if (Session::has('error_message')) <!-- Verifica el método updateAdminPassword() en AdminController.php -->
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Mostrando los errores de validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{-- <strong>Error:</strong> {{ Session::get('error_message') }} --}}

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {{-- Mostrando los errores de validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña de administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Verifica el método updateAdminPassword() en AdminController.php -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            

                            <form class="forms-sample" action="{{ url('admin/edit-shipping-charges/' . $shippingDetails['id']) }}" method="post"> <!-- Si el id no se pasa desde la ruta, esto significa 'Agregar un nuevo Cargo de Envío', pero si se pasa el id desde la ruta, esto significa 'Editar el Cargo de Envío' --> <!-- Usando enctype="multipart/form-data" para permitir la subida de archivos (imágenes) -->
                                @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                <div class="form-group">
                                    <label for="country">País</label>
                                    <input type="text" class="form-control" value="{{ $shippingDetails['country'] }}" readonly> 
                                </div>
                                <div class="form-group">
                                    <label for="0_500g">Tarifa (0-500g)</label>
                                    <input type="text" class="form-control" id="0_500g" placeholder="Ingrese la Tarifa de Envío" name="0_500g" value="{{ $shippingDetails['0_500g'] }}"> 
                                </div>
                                <div class="form-group">
                                    <label for="501g_1000g">Tarifa (501g-1000g)</label>
                                    <input type="text" class="form-control" id="501g_1000g" placeholder="Ingrese la Tarifa de Envío" name="501g_1000g" value="{{ $shippingDetails['501g_1000g'] }}"> 
                                </div>
                                <div class="form-group">
                                    <label for="1001_2000g">Tarifa (1001-2000g)</label>
                                    <input type="text" class="form-control" id="1001_2000g" placeholder="Ingrese la Tarifa de Envío" name="1001_2000g" value="{{ $shippingDetails['1001_2000g'] }}"> 
                                </div>
                                <div class="form-group">
                                    <label for="2001g_5000g">Tarifa (2001g-5000g)</label>
                                    <input type="text" class="form-control" id="2001g_5000g" placeholder="Ingrese la Tarifa de Envío" name="2001g_5000g" value="{{ $shippingDetails['2001g_5000g'] }}"> 
                                </div>
                                <div class="form-group">
                                    <label for="above_5000g">Tarifa (Más de 5000g)</label>
                                    <input type="text" class="form-control" id="above_5000g" placeholder="Ingrese la Tarifa de Envío" name="above_5000g" value="{{ $shippingDetails['above_5000g'] }}"> 
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button type="reset"  class="btn btn-light">Cancelar</button>
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
