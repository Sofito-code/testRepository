
@extends('layouts.app')
@section('title','Tienda | '. $product->title)
@section('content')
<div class="container-sm">
    @auth()
        @if(auth()->user()->is_admin)
        <div class="btn-group" role="group" style="float: right;">
            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opciones
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{route('product.edit', $product)}}">Editar</a>
                <form method="POST" action="{{route('product.destroy',$product)}}">
                    @csrf @method('DELETE')
                    <a class="dropdown-item" type="submit">Eliminar</a>
                </form>
            </div>
        </div>

        @endif
    @endauth
    <div class="card mb-3">
        <img src="/images/products/{{$product->image}}" class="card-img-top" alt="{{$product->image}}">
        <div class="card-body">
          <h5 class="card-title">{{$product->title}}</h5>
          <p class="card-text">{{$product->description}}</p>
          <p class="card-text">{{$product->price}}</p>
          <p class="card-text"><small class="text-muted">{{$product->created_at->diffForHumans()}}</small></p>
          <a href="3" class="btn btn-success">Comprar</a>
        </div>
      </div>
</div>
@endsection
