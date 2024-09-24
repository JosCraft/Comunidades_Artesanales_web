<!--
    Este componente es utilizado para mostrar el formulario de registro de promociones
    en la vista de registro de promociones.
    con los siguientes datos
    tipo', 'nombre_promocion', 'descripcion', 'descuento'
-->

<div class="row mb-3">
    <label for="tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo') }}</label>
    <div class="col-md-6">
        <input id="tipo"
        type="text"
        class="form-control
        @error('tipo') is-invalid
         @enderror" name="tipo"
        value="{{ old('tipo', $promocion->tipo ?? '') }}" required autocomplete="tipo" autofocus>
        @error('tipo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="nombre_promocion" class="col-md-4 col-form-label text-md-end">{{ __('Nombre Promocion') }}</label>
    <div class="col-md-6">
        <input id="nombre_promocion"
        type="text"
        class="form-control
        @error('nombre_promocion') is-invalid
         @enderror" name="nombre_promocion"
        value="{{ old('nombre_promocion', $promocion->nombre_promocion ?? '') }}" required autocomplete="nombre_promocion" autofocus>
        @error('nombre_promocion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion') }}</label>
    <div class="col-md-6">
        <input id="descripcion"
        type="text"
        class="form-control
        @error('descripcion') is-invalid
         @enderror" name="descripcion"
        value="{{ old('descripcion', $promocion->descripcion ?? '') }}" required autocomplete="descripcion" autofocus>
        @error('descripcion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="descuento" class="col-md-4 col-form-label text-md-end">{{ __('Descuento') }}</label>
    <div class="col-md-6">
        <input id="descuento"
        type="text"
        class="form-control
        @error('descuento') is-invalid
         @enderror" name="descuento"
        value="{{ old('descuento', $promocion->descuento ?? '') }}" required autocomplete="descuento" autofocus>
        @error('descuento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="fecha_inicio" class="col-md-4 col-form-label text-md-end">{{ __('Fecha Inicio') }}</label>
    <div class="col-md-6">
        <input id="fecha_inicio"
               type="date"
               class="form-control @error('fecha_inicio') is-invalid @enderror"
               name="fecha_inicio"
               value="{{ old('fecha_inicio', isset($promocion->pivot) && $promocion->pivot->fecha_inicio ? $promocion->pivot->fecha_inicio->format('Y-m-d') : '') }}"
               required autocomplete="fecha_inicio" autofocus>
        @error('fecha_inicio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="fecha_fin" class="col-md-4 col-form-label text-md-end">{{ __('Fecha Fin') }}</label>
    <div class="col-md-6">
        <input id="fecha_fin"
               type="date"
               class="form-control @error('fecha_fin') is-invalid @enderror"
               name="fecha_fin"
               value="{{ old('fecha_fin', isset($promocion->pivot) && $promocion->pivot->fecha_fin ? $promocion->pivot->fecha_fin->format('Y-m-d') : '') }}"
               required autocomplete="fecha_fin" autofocus>
        @error('fecha_fin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



