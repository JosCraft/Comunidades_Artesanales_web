<x-layouts.app>
    <div class="container">
        <h1>Editar Perfil</h1>
        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ auth()->user()->nombre }}">
            </div>
            <div class="mb-3">
                <label for="apePaterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="apePaterno" name="apePaterno" value="{{ auth()->user()->apePaterno }}">
            </div>
            <div class="mb-3">
                <label for="apeMaterno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="apeMaterno" name="apeMaterno" value="{{ auth()->user()->apeMaterno }}">
            </div>

            <div class="mb-3">
                <!-- GENERO -->
                <label for="genero" class="form-label">Género</label>
                <select class="form-select" id="genero" name="genero">
                    <option value="M" {{ auth()->user()->genero == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ auth()->user()->genero == 'F' ? 'selected' : '' }}>Femenino</option>
            </div>

            <div class="mb-3">
                <label for="celular" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="celular" name="celular" value="{{ auth()->user()->celular }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
            </div>

            <!-- fechaNac -->
            <div class="mb-3">
                <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechaNac" name="fechaNac" value="{{ auth()->user()->fechaNac }}">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</x-layouts.app>
