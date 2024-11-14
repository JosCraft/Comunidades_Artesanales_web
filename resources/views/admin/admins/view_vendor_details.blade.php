@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold" style="color: #D95436;">Detalles del Usuario</h3>
                        <h6 class="font-weight-normal mb-0">
                            <a href="{{ url('admin/admins') }}" style="color: #04BFBF;">Volver a Atrás</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información Personal -->
        <!-- <form action="{{ route('admin.updateVendorDetails', ['id' => $vendorDetails->id, 'slug' => 'personal']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4" style="background-color: #F2F2F2;">
                <div class="card-body">
                    <h4 class="card-title" style="color: #D99A25;">Información Personal</h4>
                    <div class="form-group">
                        <label for="vendor_name">Nombre</label>
                        <input type="text" class="form-control" name="vendor_name" id="vendor_name" value="{{ old('vendor_name', $vendorDetails->vendorPersonal->name ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_email">Correo Electrónico</label>
                        <input type="email" class="form-control" name="vendor_email" id="vendor_email" value="{{ old('vendor_email', $vendorDetails->vendorPersonal->email ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_address">Dirección</label>
                        <input type="text" class="form-control" name="vendor_address" id="vendor_address" value="{{ old('vendor_address', $vendorDetails->vendorPersonal->address ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_city">Ciudad</label>
                        <input type="text" class="form-control" name="vendor_city" id="vendor_city" value="{{ old('vendor_city', $vendorDetails->vendorPersonal->city ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_mobile">Móvil</label>
                        <input type="text" class="form-control" name="vendor_mobile" id="vendor_mobile" value="{{ old('vendor_mobile', $vendorDetails->vendorPersonal->mobile ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_image">Foto del Vendedor</label>
                        <input type="file" class="form-control" name="vendor_image" id="vendor_image">
                        @if(!empty($vendorDetails->vendorPersonal->image))
                            <br>
                            <img id="vendorImagePreview" style="width: 200px" src="{{ url('admin/images/photos/' . $vendorDetails->vendorPersonal->image) }}">
                        @endif
                    </div>
                    <button type="submit" class="btn" style="background-color: #D95436; color: white;">Actualizar Información Personal</button>
                </div>
            </div>
        </form>
        -->
        <!-- Información del Negocio -->
        <form action="{{ route('admin.updateVendorDetails', ['id' => $vendorDetails->id, 'slug' => 'business']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4" style="background-color: #F2F2F2;">
                <div class="card-body">
                    <h4 class="card-title" style="color: #D99A25;">Información del Negocio</h4>
                    <div class="form-group">
                        <label for="shop_name">Nombre de la Tienda</label>
                        <input type="text" class="form-control" name="shop_name" id="shop_name" value="{{ old('shop_name', $vendorDetails->vendorBusiness->shop_name ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_address">Dirección de la Tienda</label>
                        <input type="text" class="form-control" name="shop_address" id="shop_address" value="{{ old('shop_address', $vendorDetails->vendorBusiness->shop_address ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_city">Ciudad de la Tienda</label>
                        <input type="text" class="form-control" name="shop_city" id="shop_city" value="{{ old('shop_city', $vendorDetails->vendorBusiness->shop_city ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_mobile">Teléfono de la Tienda</label>
                        <input type="text" class="form-control" name="shop_mobile" id="shop_mobile" value="{{ old('shop_mobile', $vendorDetails->vendorBusiness->shop_mobile ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address_proof_image">Imagen de Prueba de Dirección</label>
                        <input type="file" class="form-control" name="address_proof_image" id="address_proof_image" onchange="previewImage(event, 'proofImagePreview')">
                        <br>
                        @if(!empty($vendorDetails->vendorBusiness->address_proof_image))
                            <img id="proofImagePreview" style="width: 200px" src="{{ url('admin/images/proofs/' . $vendorDetails->vendorBusiness->address_proof_image) }}">
                        @else
                            <img id="proofImagePreview" style="width: 200px; display: none;">
                        @endif
                    </div>
                    <button type="submit" class="btn" style="background-color: #04BFBF; color: white;">Actualizar Información del Negocio</button>
                </div>
            </div>
        </form>

        <!-- Información Bancaria -->
        <form action="{{ route('admin.updateVendorDetails', ['id' => $vendorDetails->id, 'slug' => 'bank']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4" style="background-color: #F2F2F2;">
                <div class="card-body">
                    <h4 class="card-title" style="color: #A66953;">Información Bancaria</h4>
                    <div class="form-group">
                        <label for="account_holder_name">Nombre del Titular de la Cuenta</label>
                        <input type="text" class="form-control" name="account_holder_name" id="account_holder_name" value="{{ old('account_holder_name', $vendorDetails->vendorBank->account_holder_name ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bank_name">Nombre del Banco</label>
                        <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ old('bank_name', $vendorDetails->vendorBank->bank_name ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="account_number">Número de Cuenta</label>
                        <input type="text" class="form-control" name="account_number" id="account_number" value="{{ old('account_number', $vendorDetails->vendorBank->account_number ?? '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bank_ifsc_code">Código IFSC del Banco</label>
                        <input type="text" class="form-control" name="bank_ifsc_code" id="bank_ifsc_code" value="{{ old('bank_ifsc_code', $vendorDetails->vendorBank->bank_ifsc_code ?? '') }}" required>
                    </div>
                    <button type="submit" class="btn" style="background-color: #D95436; color: white;">Actualizar Información Bancaria</button>
                </div>
            </div>
        </form>
    </div>
    @include('admin.layout.footer')
</div>

<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById(previewId);
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
