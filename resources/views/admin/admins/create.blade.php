@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Detalles del Vendedor</h3>
                            <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/admins/vendor') }}">Volver a Atras</a></h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información Personal -->
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Información Personal</h4>
                            <form action="{{ url('admin/save-personal-details') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" 
                                           value="{{ optional($admin->vendorPersonal)->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_name">Nombre</label>
                                    <input type="text" class="form-control" name="name" 
                                           value="{{ optional($admin->vendorPersonal)->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="vendor_address">Dirección</label>
                                    <input type="text" class="form-control" name="address" 
                                           value="{{ optional($admin->vendorPersonal)->address }}">
                                </div>
                                <!-- Campos adicionales -->
                                <div class="form-group">
                                    <label for="vendor_image">Foto del Vendedor</label><br>
                                    @if ($admin->vendorPersonal && $admin->vendorPersonal->image)
                                        <img style="width: 200px" src="{{ url('admin/images/photos/' . $admin->vendorPersonal->image) }}"><br><br>
                                    @endif
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar Información Personal</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Información del Negocio -->
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Información del Negocio</h4>
                            <form action="{{ url('admin/save-business-details') }}" method="POST">
                                @csrf
                                <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                <div class="form-group">
                                    <label for="shop_name">Nombre de la Tienda</label>
                                    <input type="text" class="form-control" name="shop_name" 
                                           value="{{ optional($vendor->businessDetails)->shop_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="shop_address">Dirección de la Tienda</label>
                                    <input type="text" class="form-control" name="shop_address" 
                                           value="{{ optional($vendor->businessDetails)->shop_address }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar Información del Negocio</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Información Bancaria -->
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Información Bancaria</h4>
                            <form action="{{ url('admin/save-bank-details') }}" method="POST">
                                @csrf
                                <input type="hidden" name="vendor_id" value="{{ $vendor->id }}">
                                <div class="form-group">
                                    <label for="account_holder_name">Nombre del Titular de la Cuenta</label>
                                    <input type="text" class="form-control" name="account_holder_name" 
                                           value="{{ optional($vendor->bankDetails)->account_holder_name }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar Información Bancaria</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
    </div>
@endsection
