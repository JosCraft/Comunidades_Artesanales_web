<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title ?? '' }} </title>
    @include('sweetalert::alert') <!-- Incluye SweetAlert -->
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <x-nav.nav/>
    <div class="container-fluid">
        <div class="row">
                <x-comunario.sidebar/>
            <!-- Contenido principal -->
            <main class="col">
                {{ $slot }}
            </main>
        </div>
    </div>
    <x-footer.footer/>
</body>

<script>
    document.getElementById('showAlert').addEventListener('click', function() {
        Swal.fire({
            title: 'Alerta!',
            text: 'Esto es una alerta con SweetAlert2',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    });
</script>

</html>
