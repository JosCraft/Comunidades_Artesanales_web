<x-layouts.app-admin>
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session('message ') }}',
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

    <h1>Editar Comunidad {{ $comunidad->nombre_comunidad }} </h1>

    <form action="{{ route('admin.gestion_comunidad.update', $comunidad->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.register-comunidad :comunidad="$comunidad" />
        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>
            </div>
    </form>


</x-layouts.app-admin>
