
@extends('layouts.app')
@section('title','Tienda | '. $product->title)
@section('content')
<div class="container align-items-center">
    @auth()
        @if(auth()->user()->is_admin)
        <div class="btn-group" role="group" style="float: right;">
            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opciones
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{route('product.edit', $product)}}">Editar</a>
                <a class="dropdown-item" href="{{route('product.changeState', $product->id)}}">Deshabilitar</a>
                <a class="dropdown-item" href="{{route('product.confirmDestroy', $product)}}">Eliminar</a>
            </div>
        </div>

        @endif
    @endauth

    <div class="card mb-3 border-success" style="">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="/images/products/{{$product->image}}"  class="card-img" alt="{{$product->image}}">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{$product->title}}</h5>
              <p class="card-text">{{$product->description}}</p>
              <p class="card-text">{{$product->price}}</p>
              <p class="card-text"><small class="text-muted">{{$product->created_at->diffForHumans()}}</small></p>
              <a href="#" class="btn btn-success float-right">Comprar</a>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
