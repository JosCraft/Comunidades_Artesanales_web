@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Banners de la Página Principal</h4>

                            <a href="{{ url('admin/add-edit-banner') }}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-primary">Agregar Banner</a>

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
                                <table id="banners" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Tipo</th>
                                            <th>Enlace</th>
                                            <th>Título</th>
                                            <th>Alt</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td>{{ $banner['id'] }}</td>
                                                <td>
                                                    <img style="width: 180px" src="{{ asset('front/images/banner_images/' . $banner['image']) }}">
                                                </td>
                                                <td>{{ $banner['type'] }}</td>
                                                <td>{{ $banner['link'] }}</td>
                                                <td>{{ $banner['title'] }}</td>
                                                <td>{{ $banner['alt'] }}</td>
                                                <td>
                                                    @if ($banner['status'] == 1)
                                                        <a class="updateBannerStatus" id="banner-{{ $banner['id'] }}" banner_id="{{ $banner['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i>
                                                        </a>
                                                    @else
                                                        <a class="updateBannerStatus" id="banner-{{ $banner['id'] }}" banner_id="{{ $banner['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-banner/' . $banner['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i>
                                                    </a>

                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="banner" moduleid="{{ $banner['id'] }}">
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
        <!-- contenido finaliza -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
    </div>
@endsection
