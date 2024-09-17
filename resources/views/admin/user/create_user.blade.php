<x-layouts.app-admin>
    <div class="container" x-data="{ activeTab: 'admin' }">
        <div class="">
            <div class="">
                <h1>Registrar Datos Usuario</h1>
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

                <!-- Formulario de registro de usuario -->
                <form action="{{ route('admin.gestion_usuario.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Aquí debes asegurarte de usar old() para mantener los datos previos -->
                    <x-form.register :oldData="old()" />

                    <button type="submit" class="btn btn-primary mt-3">Registrar Usuario</button>
                </form>
            </div>

        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</x-layouts.app-admin>
