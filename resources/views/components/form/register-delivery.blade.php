<!--
Datos del registro para el delivery
'servicio' = estandar o exres,
 'salario' = poner como basico 50,
 'turno' = mañana o tarde o noche,
  'id_comunidad' sera un select con las comunidades cargadas,
-->
<!-- titulo -->
<div class="row mb-3">
    <label for="titulo" class="col-md-4 col-form-label text-md-end">{{ __('Registro Delivery') }}</label>
</div>
<!-- servicio -->
<div class="row mb-3">
    <label for="servicio" class="col-md-4 col-form-label text-md-end">{{ __('Servicio') }}</label>

    <div class="col-md-6">
        <select id="servicio" class="form-select @error('servicio') is-invalid @enderror" name="servicio"
            value="{{ old('servicio', $user->servicio ) }}" required autocomplete="servicio" autofocus>
            <option value="estandar">Estandar</option>
            <option value="express">Express</option>
        </select>
        @error('servicio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- salario -->
<div class="row mb-3">
    <label for="salario" class="col-md-4 col-form-label text-md-end">{{ __('Salario') }}</label>

    <div class="col-md-6">
        <input id="salario" type="text" class="form-control @error('salario') is-invalid @enderror" name="salario"
            value="{{ old('salario', $user->salario) }}" required autocomplete="salario" autofocus>

        @error('salario')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- turno -->

<div class="row mb-3">
    <label for="turno" class="col-md-4 col-form-label text-md-end">{{ __('Turno') }}</label>

    <div class="col-md-6">
        <select id="turno" class="form-select @error('turno') is-invalid @enderror" name="turno"
            value="{{ old('turno', $user->turno) }}" required autocomplete="turno" autofocus>
            <option value="mañana">Mañana</option>
            <option value="tarde">Tarde</option>
            <option value="noche">Noche</option>
        </select>
        @error('turno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- id_comunidad -->
<div class="row mb-3">
    <label for="id_comunidad" class="col-md-4 col-form-label text-md-end">{{ __('Comunidad') }}</label>

    <div class="col-md-6">
        <select id="id_comunidad" class="form-select @error('id_comunidad') is-invalid @enderror" name="id_comunidad"
            required autocomplete="id_comunidad" autofocus>
            <option value="" disabled {{ old('id_comunidad', $user->id_comunidad) ? '' : 'selected' }}>Seleccione una comunidad</option>
            @foreach ($comunidades as $comunidad)
                <option value="{{ $comunidad->id }}" {{ old('id_comunidad') == $comunidad->id ? 'selected' : '' }}>
                    {{ $comunidad->nombre_comunidad }}
                </option>
            @endforeach
        </select>
        @error('id_comunidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


