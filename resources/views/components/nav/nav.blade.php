<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <i class="fa-solid fa-store"></i>
      <a class="navbar-brand" href="{{ '/' }}">E-COMERCE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">
                    <i class="fa-solid fa-house"></i>
                    Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('comunidades') }}">
                    <i class="fa-solid fa-users"></i>
                    Comunidad
                </a>
            </li>
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="{{ route('productos') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-store"></i>
                    Productos
                </a>
                <ul class="dropdown-menu">
                    <!-- route('productos.categoria', $categoria->id) }}-->
                    <?php
                $categorias = App\Models\Categoria::all();
                ?>
                    @foreach ($categorias as $categoria)
                    <li>
                        <a class="dropdown-item" href="">
                            {{ $categoria->nombre }}
                        </a>
                    </li>
                    @endforeach
                  </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('contacto') }}">
                    <i class="fa-solid fa-envelope"></i>
                    Contacto
                </a>
        </ul>
        <div class="d-flex">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Carrito
                    </a>
                </li>
                @if(auth()->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }} <!-- Muestra el nombre del usuario autenticado -->
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <button type="submit" style="display: none;"></button>
                    </form>

                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Iniciar Sesión</a>
                </li>
                @endif
            </ul>
        </div>
      </div>
    </div>
</nav>
