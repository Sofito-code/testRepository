
@extends('layouts.app')
@section('title','Tienda | '.$product->title)
@section('content')
    <h1>{{$product->title}}</h1>

    @auth()
        @if(auth()->user()->is_admin)
            <a href="{{route('product.edit', $product)}}">Editar</a><br>

            <form method="POST" action="{{route('product.destroy',$product)}}">
                @csrf @method('DELETE')
                <button>Eliminar</button>
            </form>
        @endif
    @endauth


    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->created_at->diffForHumans()}}</p>
    <button>Comprar</button>
@endsection
