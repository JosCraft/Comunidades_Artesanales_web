<x-layouts.app-admin>
    <div class="container">
        <h1>Registrar Datos Producto</h1>
        @if (session('message'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: '{{ session('message') }}',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        @endif
        <!-- SweetAlert para errores de validación -->
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error en la validación',
                        html: `
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        `,
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        @endif

        <!-- Formulario de registro de comunidad -->
        <form action="{{ route('admin.gestion_comunidad.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Aquí debes asegurarte de usar old() para mantener los datos previos -->
            <x-form.register-comunidad :oldData="old()" />

            <button type="submit" class="btn btn-primary mt-3">Registrar Comunidad</button>
        </form>

    </div>
</x-layouts.app-admin>
