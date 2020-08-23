<div class="fixed-top">
    <nav class="navbar navbar-light " style="background-color: #FFA73E;">
        <div class="container">
            @auth
            <?php $route = 'home'?>
            @endauth
            <a class="navbar-brand" href="{{ route($route) }}">
                <img src="/images/nav/logoNav.png" width="180" height="100%">
            </a>

            {{-- buscador --}}
        <form class="form-inline mr-auto" action="{{route('product.index')}}">
                <div class="col-xs-5" style="margin-left: 105px;">
                  <input name="search"class="form-control" type="search" placeholder="Buscar productos" style="width:400px; border: 1px solid #6bc72a">
                  <button class="btn button-transparent" type="submit" style="padding-top: 0rem; padding-bottom: 0rem;"><img src="/images/icons/searchIcon.png" width="40" height="100%"></button>
                </div>
            </form>

            @guest
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">
                        <img src="/images/nav/buttonSingin.png" width="150" height="100%">
                    </a>
                @endif
                <a class="nav-link" href="{{ route('login') }}">
                    <img src="/images/nav/buttonLogin.png" width="90" height="100%">
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
<nav class="shadow navbar" style="background-color: #9B5D27; height: 25px; padding-top: 2px;" background="{{ asset('images/nav/backgroundnav2.png') }}">
        <div class="row justify-content-center" style="width: 100%; padding-left: 6rem; padding-top: 0rem">
            <a class="col nav-link {{setActive('product.*')}}" href="{{route('product.index')}}" style="padding-top: 0rem">Productos</a>
            <a class="col nav-link" href="#" style="padding-top: 0rem">Galería</a>
            <a class="col nav-link" href="#" style="padding-top: 0rem">Sobre Nosotros</a>
            <a class="col nav-link" href="#" style="padding-top: 0rem">Contáctanos</a>
            @auth
                @if(auth()->user()->is_admin)
                    <a class="col nav-link {{setActive('client.index')}}" href="{{ route('client.index')}}" style="padding-top: 0rem">Usuarios</a>
                    <a class="col nav-link {{setActive('role.index')}}" href="{{ route('role.index')}}" style="padding-top: 0rem">Roles</a>
                @endif
            @endauth
        </div>
    </nav>
</div>

