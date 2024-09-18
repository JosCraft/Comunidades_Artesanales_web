<!--
    forumario de solo input para el comunidad
     protected $table = 'comunidades';
    protected $fillable = ['pais', 'departamento', 'municipio', 'nombre_comunidad'];
    con sus mensajes de error y permitir obtener los datos anteriores
-->

<div class="row mb-3">
    <label for="pais" class="col-md-4 col-form-label text-md-end">{{ __('Pais') }}</label>
    <div class="col-md-6">
        <input id="pais"
        type="text"
        class="form-control
        @error('pais') is-invalid
         @enderror" name="pais"
        value="{{ old('pais', $comunidad->pais ?? '') }}" required autocomplete="pais" autofocus>
        @error('pais')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="departamento" class="col-md-4 col-form-label text-md-end">{{ __('Departamento') }}</label>
    <div class="col-md-6">
        <input id="departamento"
        type="text"
        class="form-control
        @error('departamento') is-invalid
         @enderror" name="departamento"
        value="{{ old('departamento', $comunidad->departamento ?? '') }}" required autocomplete="departamento" autofocus>
        @error('departamento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="municipio" class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>
    <div class="col-md-6">
        <input id="municipio"
        type="text"
        class="form-control
        @error('municipio') is-invalid
         @enderror" name="municipio"
        value="{{ old('municipio',  $comunidad->municipio  ?? '') }}" required autocomplete="municipio" autofocus>
        @error('municipio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="nombre_comunidad" class="col-md-4 col-form-label text-md-end">{{ __('Nombre Comunidad') }}</label>
    <div class="col-md-6">
        <input id="nombre_comunidad"
        type="text"
        class="form-control
        @error('nombre_comunidad') is-invalid
         @enderror" name="nombre_comunidad"
        value="{{ old('nombre_comunidad', $comunidad->nombre_comunidad ?? '') }}" required autocomplete="nombre_comunidad" autofocus>
        @error('nombre_comunidad')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
