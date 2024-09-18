<!--
    generar un formulario para registrar un producto solo los inputs
    con los siguientes campos
            'nombre_producto',
        'imagen',
        'id_categoria',
        'texto_corto',
        'precio',
        'size',
        'color',
        'qty', cantidad dispoinble
        'estado',
        'contenido',
-->

<!-- nombre_producto -->
<div class="row mb-3">
    <label for="nombre_producto" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del producto') }}</label>
    <div class="col-md-6">
        <input id="nombre_producto" type="text" class="form-control @error('nombre_producto') is-invalid @enderror" name="nombre_producto" value="{{ old('nombre_producto', $producto->nombre_producto ?? '') }}" required autocomplete="nombre_producto" autofocus>
        @error('nombre_producto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- imagen -->
<div class="row mb-3">
    <label for="imagen" class="col-md-4 col-form-label text-md-end">{{ __('Imagen') }}</label>
    <div class="col-md-6">
        <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen', $producto->imagen ?? '') }}" autocomplete="imagen" autofocus>
        @error('imagen')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- id_categoria -->

<div class="row mb-3">
    <label for="id_categoria" class="col-md-4 col-form-label text-md-end">{{ __('Categoria') }}</label>
    <div class="col-md-6">
        <select id="id_categoria" class="form-select @error('id_categoria') is-invalid @enderror" name="id_categoria" required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('id_categoria', $producto->id_categoria ?? '') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        @error('id_categoria')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- texto_corto -->
<div class="row mb-3">
    <label for="texto_corto" class="col-md-4 col-form-label text-md-end">{{ __('Texto corto') }}</label>
    <div class="col-md-6">
        <input id="texto_corto" type="text" class="form-control @error('texto_corto') is-invalid @enderror" name="texto_corto" value="{{ old('texto_corto', $producto->texto_corto ?? '') }}" required autocomplete="texto_corto" autofocus>
        @error('texto_corto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- precio -->
<div class="row mb-3">
    <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('Precio') }}</label>
    <div class="col-md-6">
        <input id="precio" type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio', $producto->precio ?? '') }}" required autocomplete="precio" autofocus>
        @error('precio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>


<!-- size -->
<div class="row mb-3">
    <label for="size" class="col-md-4 col-form-label text-md-end">{{ __('Tamaño') }}</label>
    <div class="col-md-6">
        <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size', $producto->size ?? '') }}" required autocomplete="size" autofocus>
        @error('size')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- color -->
<div class="row mb-3">
    <label for="color" class="col-md-4 col-form-label text-md-end">{{ __('Color') }}</label>
    <div class="col-md-6">
        <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color', $producto->color ?? '') }}" required autocomplete="color" autofocus>
        @error('color')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- qty -->
<div class="row mb-3">
    <label for="qty" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad disponible') }}</label>
    <div class="col-md-6">
        <input id="qty" type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty', $producto->qty ?? '') }}" required autocomplete="qty" autofocus>
        @error('qty')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- estado -->
<div class="row mb-3">
    <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>
    <div class="col-md-6">
        <select id="estado" class="form-select @error('estado') is-invalid @enderror" name="estado" required>
            <option value="1" {{ old('estado', $producto->estado ?? '') == '1' ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ old('estado', $producto->estado ?? '') == '0' ? 'selected' : '' }}>Inactivo</option>
        </select>
        @error('estado')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- contenido -->
<div class="row mb-3">
    <label for="contenido" class="col-md-4 col-form-label text-md-end">{{ __('Contenido') }}</label>
    <div class="col-md-6">
        <textarea id="contenido" class="form-control @error('contenido') is-invalid @enderror" name="contenido" required>{{ old('contenido', $producto->contenido ?? '') }}</textarea>
        @error('contenido')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>





