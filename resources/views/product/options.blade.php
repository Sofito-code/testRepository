@auth()
    @if(auth()->user()->is_admin && request()->routeIs('product.index'))
        <div class="btn-group" role="group" style="float: left;left: 20px;margin-bottom: 30px; margin-right: 30px;">
            <button id="btnGroupDrop1" type="button"
                class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Opciones
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="{{route('product.create')}}">
                Crear producto
            </a>
            <a class="dropdown-item" href="{{route('product.whiteList')}}">
                Ver listado de productos
            </a>
            <a class="dropdown-item" href="{{route('product.blackList')}}">
                Ver listado de productos deshabilitados
            </a>
            </div>
        </div>
    @endif
@endauth
