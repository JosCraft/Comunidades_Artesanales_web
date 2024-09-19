<x-layouts.app>
    @vite(['resources/css/style_validation.css'])

    <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="container-page" id="container">
                <div class="login-container" id="LoginContainer">
                    <div class="login-cabecera">
                        <a class="navbar-brand d-flex justify-content-center" href="#">
                            <img src="{{ asset('storage/fotos/logo.png') }}" alt="Logo" width="250" height="250">
                        </a>
                        <h1>Ingrese Código</h1>
                    </div>

                    <form method="POST" action="{{ route('verificarCodigo') }}">
                        @csrf
                        <div class="input-group">
                            <!-- Inputs de un solo dígito -->
                            <input type="text" class="form-control input-D" id="digit_1" name="digits[]" required maxlength="1" pattern="[0-9]*" inputmode="numeric">
                            <input type="text" class="form-control input-D" id="digit_2" name="digits[]" required maxlength="1" pattern="[0-9]*" inputmode="numeric">
                            <input type="text" class="form-control input-D" id="digit_3" name="digits[]" required maxlength="1" pattern="[0-9]*" inputmode="numeric">
                            <input type="text" class="form-control input-D" id="digit_4" name="digits[]" required maxlength="1" pattern="[0-9]*" inputmode="numeric">
                            <input type="text" class="form-control input-D" id="digit_5" name="digits[]" required maxlength="1" pattern="[0-9]*" inputmode="numeric">
                            <input type="text" class="form-control input-D" id="digit_6" name="digits[]" required maxlength="1" pattern="[0-9]*" inputmode="numeric">
                        </div>

                        <button type="submit" class="button-login">Verificar Código</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Muestra alertas en caso de error o bloqueo
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('bloqueo'))
            alert("{{ session('bloqueo') }}");
        @endif

        // Foco automático en los campos de un dígito
        const inputs = document.querySelectorAll('.input-D');
        inputs.forEach((input, index) => {
            input.addEventListener('input', function () {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
        });
    </script>

</x-layouts.app>
