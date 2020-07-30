@extends('layouts.app')
@section('title','Tienda | Chocoloco')
@section('content')

<div class="container">
    <h1 class="text-center">Tienda</h1>
    @auth()
        @if(auth()->user()->is_admin)
        <div class="btn-group" role="group" style="float: right;">
            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Opciones
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <a class="dropdown-item" href="{{route('product.create')}}">Crear producto</a>
              <a class="dropdown-item" href="{{route('product.whiteList')}}">Ver listado de productos</a>
            </div>
        </div>
        @endif
    @endauth
    <ul>
        <div class="row">
            @forelse($products as $productItem)
                @if($productItem['enabled']==false)
                    @continue
                @endif
                <div class="col-sm-4 " style="padding-top: 15px; padding-bottom: 15px;">
                    <div class="card border-success text-center" style="width: 18rem;">
                        <img src="images/products/{{$productItem->image }}" class="card-img-top" alt="{{$productItem->image}}" style="height: 18rem;width: 18rem; object-fit:cover">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $productItem->title }}</h5>
                            <a href="{{ route('product.show', $productItem)}}" class="btn btn-success">Ver detalles</a>
                        </div>
                    </div>
                </div>
            @empty
                <li>No hay productos creados</li>
            @endforelse
        </div>
    </ul>
</div>
@endsection
