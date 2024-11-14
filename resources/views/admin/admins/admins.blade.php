@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>

                            <!-- Botón para abrir el formulario de crear administrador -->
                            <a href="{{ route('admins.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID del Admin</th>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Imagen</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin['id'] }}</td>
                                                <td>{{ $admin['name'] }}</td>
                                                <td>{{ $admin['type'] }}</td>
                                                <td>{{ $admin['mobile'] }}</td>
                                                <td>{{ $admin['email'] }}</td>
                                                <td>
                                                    @if ($admin['image'] != '')
                                                        <img src="{{ asset('admin/images/photos/' . $admin['image']) }}">
                                                    @else
                                                        <img src="{{ asset('admin/images/photos/no-image.gif') }}">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin['status'] == 1)
                                                        <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i>
                                                        </a>
                                                    @else
                                                        <a class="updateAdminStatus" id="admin-{{ $admin['id'] }}" admin_id="{{ $admin['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                   
                                                        <a href="{{ url('admin/view-vendor-details/' . $admin['id']) }}">
                                                            <i style="font-size: 25px" class="mdi mdi-file-document"></i>
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
    </div>
@endsection
