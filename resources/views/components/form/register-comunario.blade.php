<!--
    'especialidad',
     'id_comunidad'
 -->

<!-- titulo -->
<div class="row mb-3">
    <label for="titulo" class="col-md-4 col-form-label text-md-end">{{ __('Registro Comunario') }}</label>
</div>

<!-- especialidad -->
    <div class="row mb-3">
        <label for="especialidad" class="col-md-4 col-form-label text-md-end">{{ __('Especialidad') }}</label>

        <div class="col-md-6">
            <input id="especialidad" type="text" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad"
                value="{{ old('especialidad', $user->especialidad ) }}" required autocomplete="especialidad" autofocus>

            @error('especialidad')
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
            <option value="" disabled {{ old('id_comunidad', $user->id_comunidad ) ? '' : 'selected' }}>Seleccione una comunidad</option>
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
