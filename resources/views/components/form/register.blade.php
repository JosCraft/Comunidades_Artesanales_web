      <!-- ci -->
      <div class="row mb-3">
        <label for="ci" class="col-md-4 col-form-label text-md-end">{{ __('CI') }}</label>
        <div class="col-md-6">
            <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autocomplete="ci" autofocus>
        </div>
    </div>

    <!-- nombre -->
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

    <!-- apellidos  apePaterno -->
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
    <!-- apellidos  apeMaterno -->
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
    <!-- genero -->
    <div class="row mb-3">
        <label for="genero" class="col-md-4 col-form-label text-md-end">{{ __('Genero') }}</label>

        <div class="col-md-6">
            <select id="genero" class="form-select @error('genero') is-invalid @enderror" name="genero" value="{{ old('genero') }}" required autocomplete="genero" autofocus>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
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
            <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>

            @error('celular')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- email -->
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

    <!-- password -->
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        <!-- a passsword tiene que tener almenos 1 mayuscula 1 minuscula 1 numero y 1 caracter especial -->
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <!-- fecha de Nacimiento -->
    <div class="row mb-3">
        <label for="fechaNac" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Nacimiento') }}</label>

        <div class="col-md-6">
            <input id="fechaNac" type="date" class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" value="{{ old('fechaNac') }}" required autocomplete="fechaNac" autofocus>

            @error('fechaNac')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- foto -->
    <div class="row mb-3">
        <label for="foto" class="col-md-4 col-form-label text-md-end">{{ __('Foto') }}</label>

        <div class="col-md-6">
            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" autocomplete="foto" autofocus>

            @error('foto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- rol -->
    <div class="row mb-3">
        <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>

        <div class="col-md-6">
            <select id="rol" class="form-select @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol') }}" required autocomplete="rol" autofocus>
                <option value="1">Administrador</option>
                <option value="2">Usuario</option>
            </select>
            @error('rol')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
