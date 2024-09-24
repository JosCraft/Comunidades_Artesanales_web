<x-layouts.app
:title="'Perfil Usuario'">
    <!-- mensaje de exito usando swet alert -->
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire(
                'Exito',
                '{{ session('status') }}',
                'success'
            );
        });
    </script>
@endif

    <div class="container">
        <div class="row">
            <div class="col">
                @if(auth()->user()->foto)
                    <img
                    style="width: 150px; height: 150px; object-fit: cover;"
                    src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->foto) }}" alt="User Image"/>
                @else
                    <i class="fas fa-user-circle fa-5x"></i>
                @endif

                <a href="{{ route('user.edit') }}" class="btn btn-primary">Editar Perfil</a>
            </div>

            <div class="col">
                <h1>Perfil</h1>
                <p>Nombre: {{ auth()->user()->nombre}} {{auth()->user()->apePaterno}} {{ auth()->user()->apeMaterno }} </p>
                <p>Email: {{ auth()->user()->email }}</p>
                <p>Telefono: {{ auth()->user()->telefono }}</p>
            </div>
        </div>
    </div>
</x-layouts.app>
