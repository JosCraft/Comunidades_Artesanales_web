
<!-- Nombre -->
<div class="row mb-3">
    <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $user->nombre ?? '') }}" required autocomplete="nombre" autofocus>
        @error('nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Apellido Paterno -->
<div class="row mb-3">
    <label for="apePaterno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>
    <div class="col-md-6">
        <input id="apePaterno" type="text" class="form-control @error('apePaterno') is-invalid @enderror" name="apePaterno" value="{{ old('apePaterno', $user->apePaterno ?? '') }}" required autocomplete="apePaterno" autofocus>
        @error('apePaterno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Apellido Materno -->
<div class="row mb-3">
    <label for="apeMaterno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno') }}</label>
    <div class="col-md-6">
        <input id="apeMaterno" type="text" class="form-control @error('apeMaterno') is-invalid @enderror" name="apeMaterno" value="{{ old('apeMaterno', $user->apeMaterno ?? '') }}" required autocomplete="apeMaterno" autofocus>
        @error('apeMaterno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Género -->
<div class="row mb-3">
    <label for="genero" class="col-md-4 col-form-label text-md-end">{{ __('Género') }}</label>
    <div class="col-md-6">
        <select id="genero" class="form-select @error('genero') is-invalid @enderror" name="genero" required>
            <option value="M" {{ old('genero', $user->genero ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('genero', $user->genero ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
        </select>
        @error('genero')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Celular -->
<div class="row mb-3">
    <label for="celular" class="col-md-4 col-form-label text-md-end">{{ __('Celular') }}</label>
    <div class="col-md-6">
        <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular', $user->celular ?? '') }}" required>
        @error('celular')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Email -->
<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email ?? '') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Fecha de Nacimiento -->
<div class="row mb-3">
    <label for="fechaNac" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Nacimiento') }}</label>
    <div class="col-md-6">
        <input id="fechaNac" type="date" class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" value="{{ old('fechaNac', $user->fechaNac ?? '') }}" required>
        @error('fechaNac')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Foto -->
<div class="row mb-3">
    <label for="foto" class="col-md-4 col-form-label text-md-end">{{ __('Foto') }}</label>
    <div class="col-md-6">
        <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
        @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
