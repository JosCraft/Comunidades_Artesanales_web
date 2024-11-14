@extends('admin.layout.layout')
 <!-- Comunidad_Artesanal\resources\views\admin\ratings\ratings.blade.php-->
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Calificaciones</h4>

                            {{-- Mostrando los errores de validación --}}
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="ratings" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre del Producto</th>
                                            <th>Email del Usuario</th>
                                            <th>Reseña</th>
                                            <th>Calificación</th>
                                            <th>Estado</th>
                                            <th>Respuesta</th> <!-- Nueva columna -->
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ratings as $rating)
                                            <tr>
                                                <td>{{ $rating['id'] }}</td>
                                                <td>
                                                    <a target="_blank" href="{{ url('product/' . $rating['product']['id']) }}">
                                                        {{ $rating['product']['product_name'] }}
                                                    </a>
                                                </td>
                                                <td>{{ $rating['user']['email'] }}</td>
                                                <td>{{ $rating['review'] }}</td>
                                                <td>{{ $rating['rating'] }}</td>
                                                <td>
                                                    @if ($rating['status'] == 1)
                                                        <a class="updateRatingStatus" id="rating-{{ $rating['id'] }}" rating_id="{{ $rating['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i>
                                                        </a>
                                                    @else
                                                        <a class="updateRatingStatus" id="rating-{{ $rating['id'] }}" rating_id="{{ $rating['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rating['response'])
                                                        {{ $rating['response'] }}
                                                    @else
                                                        <form action="{{ route('ratings.respond', $rating['id']) }}" method="POST">
                                                            @csrf
                                                            <textarea name="response" required placeholder="Escribe tu respuesta aquí..."></textarea>
                                                            <button type="submit">Responder</button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="rating" moduleid="{{ $rating['id'] }}">
                                                        <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- El contenido finaliza -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
    </div>

    <script>
    $(document).ready(function() {
        $('#ratings').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
    </script>
@endsection
