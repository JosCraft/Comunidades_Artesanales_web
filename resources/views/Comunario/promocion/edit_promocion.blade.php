<x-layouts.app-comunario>
    <h1>Editar Promocion</h1>
    <div class="container">

        <form action="{{ route('comunario.promocion.update', $promocion->id) }}" method="post">
            @csrf
            @method('PUT')
                <x-form.register-promocion :promocion="$promocion" />
               <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</x-layouts.app-comunario>
