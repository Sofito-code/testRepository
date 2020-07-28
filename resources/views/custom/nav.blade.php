<nav class="navbar navbar-light" style="background-color: #FFA73E;">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/images/Logo.png" width="180" height="100%"
            style="">
        </a>
        <form class="form-inline mr-auto">
            <div class="col-xs-5" style="margin-left: 70px;">
              <input class="form-control" type="text" placeholder="Buscar productos" style="width:400px">
              <a type="submit" class=""><img src="/images/searchIcon.png" width="40" height="100%"></a>
            </div>
        </form>
        @guest
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">
                    <img src="/images/buttonSingin.png" width="150" height="100%">
                </a>
            @endif
            <a class="nav-link" href="{{ route('login') }}">
                <img src="/images/buttonLogin.png" width="90" height="100%">
            </a>
        @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true"  style="color: white" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endguest
    </div>
</nav>
<nav class="navbar" style="background-color: #9B5D27; height: 25px; padding-top: 2px;">
    <div class="row justify-content-center" style="width: 100%; padding-left: 6rem; padding-top: 0rem">
        <a class="col nav-link active" href="{{route('product.index')}}" style="color: white; padding-top: 0rem">Productos</a>
        <a class="col nav-link disabled" href="#" style="color: white; padding-top: 0rem">Galería</a>
        <a class="col nav-link disabled" href="#" style="color: white; padding-top: 0rem">Sobre Nosotros</a>
        <a class="col nav-link disabled" href="#" style="color: white; padding-top: 0rem">Contáctanos</a>
        @auth
            @if(auth()->user()->is_admin)
                <a class="col nav-link active" href="{{ route('client.index')}}" style="color: white; padding-top: 0rem">Clientes</a>
                <a class="col nav-link active" href="{{ route('role.index')}}" style="color: white; padding-top: 0rem">Roles</a>
            @endif
        @endauth
    </div>
</nav>
