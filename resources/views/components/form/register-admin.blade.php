<!-- cod admin-->
<div class="row mb-3">
    <label for="codAdmin" class="col-md-4 col-form-label text-md-end">{{ __('Codigo de Administrador') }}</label>
    <div class="col-md-6">
        <input id="cod_Adm" type="text" class="form-control @error('cod_Adm') is-invalid @enderror" name="cod_Adm"
            value="{{ old('cod_Adm' , $user->cod_Adm )  }}" required autocomplete="codAdmin" autofocus>
        @error('cod_Adm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
