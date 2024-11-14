{{-- Las variables se pasan desde el método addEditCoupon() en Admin/CouponsController --}}
@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">Cupones</h4>
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

                            {{-- Nuestro código Bootstrap de error en caso de contraseña actual incorrecta o si la nueva contraseña y la confirmación no coinciden: --}}
                            {{-- Determinar si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            @if (Session::has('error_message')) <!-- Revisa AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Mostrar los errores de validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Nuestro mensaje de éxito Bootstrap en caso de que se actualice correctamente la contraseña del administrador --}}
                            @if (Session::has('success_message')) <!-- Revisa AdminController.php, método updateAdminPassword() -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form class="forms-sample" @if (empty($coupon['id'])) action="{{ url('admin/add-edit-coupon') }}" @else action="{{ url('admin/add-edit-coupon/' . $coupon['id']) }}" @endif method="post" enctype="multipart/form-data">
                                @csrf

                                @if (empty($coupon['coupon_code'])) {{-- En caso de agregar un nuevo cupón --}}
                                    <div class="form-group">
                                        <label for="coupon_option">Opción del Cupón:</label><br>
                                        <span><input type="radio" id="AutomaticCoupon" name="coupon_option" value="Automatic" checked>&nbsp;Automático&nbsp;&nbsp;</span>
                                        <span><input type="radio" id="ManualCoupon" name="coupon_option" value="Manual">&nbsp;Manual&nbsp;&nbsp;</span>
                                    </div>
                                    <div class="form-group" style="display: none" id="couponField"> {{-- Usamos style="display: none" y creamos el id="couponField" para ser usado en jQuery para mostrar/ocultar este campo dependiendo de la opción del cupón seleccionada, revisa admin/js/custom.js --}}
                                        <label for="coupon_code">Código del Cupón:</label>
                                        <input type="text" class="form-control" placeholder="Ingresar Código del Cupón" name="coupon_code">
                                    </div>
                                @else {{-- En caso de actualizar el cupón --}}
                                    <input type="hidden" name="coupon_option" value="{{ $coupon['coupon_option'] }}">
                                    <input type="hidden" name="coupon_code" value="{{ $coupon['coupon_code'] }}">
                                    <div class="form-group">
                                        <label for="coupon_code">Código del Cupón:</label>
                                        <span style="color: green; font-weight: bold">{{ $coupon['coupon_code'] }}</span>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="coupon_type">Tipo de Cupón:</label><br>
                                    <span><input type="radio" name="coupon_type" value="Multiple Times" @if (isset($coupon['coupon_type']) && $coupon['coupon_type'] == 'Multiple Times') checked @endif>&nbsp;Varias veces&nbsp;&nbsp;</span>
                                    <span><input type="radio" name="coupon_type" value="Single Time" @if (isset($coupon['coupon_type']) && $coupon['coupon_type'] == 'Single Time') checked @endif>&nbsp;Una sola vez&nbsp;&nbsp;</span>
                                </div>

                                <div class="form-group">
                                    <label for="amount_type">Tipo de Monto:</label><br>
                                    <span><input type="radio" name="amount_type" value="Percentage" @if (isset($coupon['amount_type']) && $coupon['amount_type'] == 'Percentage') checked @endif>&nbsp;Porcentaje&nbsp;(en %)&nbsp;</span>
                                    <span><input type="radio" name="amount_type" value="Fixed" @if (isset($coupon['amount_type']) && $coupon['amount_type'] == 'Fixed') checked @endif>&nbsp;Fijo&nbsp;(en Bs.)</span>
                                </div>

                                <div class="form-group">
                                    <label for="amount">Monto:</label>
                                    <input type="text" class="form-control" id="amount" placeholder="Ingresar Monto del Cupón" name="amount" @if (isset($coupon['amount'])) value="{{ $coupon['amount'] }}" @else value="{{ old('amount') }}" @endif>  {{-- Repoblar Formularios (usando old() method): https://laravel.com/docs/9.x/validation#repopulating-forms --}}
                                </div>

                                <div class="form-group">
                                    <label for="categories">Seleccionar Categoría:</label>
                                    <select name="categories[]" class="form-control text-dark" multiple>
                                        @foreach ($categories as $section)
                                            <optgroup label="{{ $section['name'] }}">
                                                @foreach ($section['categories'] as $category)
                                                    <option value="{{ $category['id'] }}" @if (in_array($category['id'], $selCats)) selected @endif>&nbsp;&nbsp;&nbsp;--&nbsp;{{ $category['category_name'] }}</option>
                                                    @foreach ($category['sub_categories'] as $subcategory)
                                                        <option value="{{ $subcategory['id'] }}" @if (in_array($subcategory['id'], $selCats)) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $subcategory['category_name'] }}</option>
                                                    @endforeach
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="brands">Seleccionar Marca:</label>
                                    <select name="brands[]" class="form-control text-dark" multiple>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand['id'] }}" @if (in_array($brand['id'], $selBrands)) selected @endif>{{ $brand['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="users">Seleccionar Usuario (por correo electrónico):</label>
                                    <select name="users[]" class="form-control text-dark" multiple>
                                        @foreach ($users as $user)
                                            <option value="{{ $user['email'] }}" @if (in_array($user['email'], $selUsers)) selected @endif>{{ $user['email'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="expiry_date">Fecha de Expiración:</label>
                                    <input type="date" class="form-control" name="expiry_date" @if (isset($coupon['expiry_date'])) value="{{ $coupon['expiry_date'] }}" @else value="{{ old('expiry_date') }}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="status">Estado:</label>
                                    <input type="checkbox" name="status" value="1" @if (isset($coupon['status']) && $coupon['status'] == 1) checked @endif>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                                <button class="btn btn-light">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
