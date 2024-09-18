@vite(['resources/css/sidebarAdmin.css',])
<div class="sideadmin ">
    <div class="">
        <ul class="">
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link">
                    Menu
                </a>
            </li>
            <li>
                <a href="{{ route('admin.gestion_usuario') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Gestion Usuarios</span>
                 </a>
            </li>
            <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Deliverys</span></a>
            </li>
            <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Productos</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Estadisticas</span> 1</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Gestionar</span> 2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Gestionar Reseñas</span>
                </a>
            </li>
        </ul>

    </div>
</div>
