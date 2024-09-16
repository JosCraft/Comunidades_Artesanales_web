<!-- cod admin-->
<div class="row mb-3">
    <label for="codAdmin" class="col-md-4 col-form-label text-md-end">{{ __('Codigo de Administrador') }}</label>

    <div class="col-md-6">
        <input id="codAdmin" type="text" class="form-control @error('codAdmin') is-invalid @enderror" name="codAdmin"
            value="{{ old('codAdmin') }}" required autocomplete="codAdmin" autofocus>
        @error('codAdmin')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
