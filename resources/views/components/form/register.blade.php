<!-- CI -->
<div class="row mb-3">
    <label for="ci" class="col-md-4 col-form-label text-md-end">{{ __('CI') }}</label>
    <div class="col-md-6">
        <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autocomplete="ci" autofocus>
        @error('ci')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Nombre -->
<div class="row mb-3">
    <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
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
        <input id="apePaterno" type="text" class="form-control @error('apePaterno') is-invalid @enderror" name="apePaterno" value="{{ old('apePaterno') }}" required autocomplete="apePaterno" autofocus>
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
        <input id="apeMaterno" type="text" class="form-control @error('apeMaterno') is-invalid @enderror" name="apeMaterno" value="{{ old('apeMaterno') }}" required autocomplete="apeMaterno" autofocus>
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
        <select id="genero" class="form-select @error('genero') is-invalid @enderror" name="genero" value="{{ old('genero') }}" required>
            <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino</option>
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
        <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required>
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
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Password -->
<div class="row mb-3" x-data="{ showPassword: false }">
    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    <div class="col-md-6 input-group">
        <input
            id="password"
            :type="showPassword ? 'text' : 'password'"
            class="form-control @error('password') is-invalid @enderror"
            name="password"
            required
            autocomplete="new-password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}"
            title="La contraseña debe tener al menos una mayúscula, una minúscula, un número y un carácter especial"
        >
        <button type="button" class="btn btn-outline-secondary" @click="showPassword = !showPassword">
            <i :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
        </button>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Confirm Password -->
<div class="row mb-3" x-data="{ showPassword: false }">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    <div class="col-md-6 input-group">
        <input
            id="password-confirm"
            :type="showPassword ? 'text' : 'password'"
            class="form-control"
            name="password_confirmation"
            required
            autocomplete="new-password"
        >
        <button type="button" class="btn btn-outline-secondary" @click="showPassword = !showPassword">
            <i :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
        </button>
    </div>
</div>


<!-- Fecha de Nacimiento -->
<div class="row mb-3">
    <label for="fechaNac" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Nacimiento') }}</label>
    <div class="col-md-6">
        <input id="fechaNac" type="date" class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" value="{{ old('fechaNac') }}" required>
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
        <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" autofocus>
        @error('foto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
