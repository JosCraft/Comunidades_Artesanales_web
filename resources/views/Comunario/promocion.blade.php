<x-layouts.app-comunario>
    <h1>Promocion</h1>
    <div class="container">
        <div class="head">
            <input type="text">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
              </button>
        </div>
        <div class="contenido">

            <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach ( $productos as $producto )
                    @foreach ( $producto->promociones as $promocion )
                    <div class="col">
                        <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $promocion->nombre_promocion }}</h5>
                            <p class="card-text">
                                <ul>
                                    <li>{{ $promocion->descripcion }}</li>
                                    <li>
                                      {{
                                        $promocion->pivot->fecha_inicio
                                      }}

                                    </li>
                                    <li>
                                        {{
                                            $promocion->pivot->fecha_fin
                                        }}
                                    </li>
                                    <li>
                                        {{
                                            $promocion->descuento
                                        }}
                                        %
                                </ul>
                            </p>
                        </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach

            </div>

        </div>
    </div>




<!-- Modal -->



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('comunario.promocion.add') }}" method="post">
            @csrf
            <div class="modal-body">
                <x-form.register-promocion />
                <!-- select con todos los producto $productos -->
                <select name="producto_id" id="producto_id" class="form-select" aria-label="Default select example">
                    <option selected>Seleccione un producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
                    @endforeach
                </select>

             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
             </div>
        </form>
      </div>
    </div>
  </div>
</x-layouts.app-comunario>
