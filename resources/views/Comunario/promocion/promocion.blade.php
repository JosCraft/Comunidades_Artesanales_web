<x-layouts.app-comunario>
    <h1>Promocion</h1>
    <div class="container">
        <div class="head">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear Promocion
              </button>
        </div>
        <div class="container mt-5">

            <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach ( $productos as $producto )
                    @foreach ( $producto->promociones as $promocion )
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header">
                                    <div class="container text-center">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                Producto :
                                              {{ $producto->nombre_producto }}
                                            </div>
                                            <div class="col-6">
                                                Promocion : {{ $promocion->nombre_promocion }}
                                            </div>
                                          </div>
                                    </div>
                            </div>
                        <div class="card-body">
                            <div class="container ">
                                <div class="row justify-content-start">
                                    <div class="col-6">
                                        <h5 class="card-text">Descripcion : </h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text">{{ $promocion->descripcion }}</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-6">
                                        <h5 class="card-text">Descuento : </h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text">{{ $promocion->descuento}} %</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-6">
                                        <h5 class="card-text">Precio : </h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text">{{ $producto->precio }}</p>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-6">
                                        <h5 class="card-text">Con descuento : </h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text">{{ $producto->precio * ($promocion->descuento / 100) }}</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">

                                    <div class="col-4">
                                        <form action="{{route('comunario.promocion.remove', [ 'producto' => $producto->id, 'promocion' => $promocion->id ])}}"  method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center text-body-secondary">
                          Inicio :  {{ $promocion->pivot->fecha_inicio }} -  Finalizacion : {{ $promocion->pivot->fecha_fin }}
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nueva Promocion</h1>
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
