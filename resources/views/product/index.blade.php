@extends('layouts.app')
@section('title','Tienda | Chocoloco')
@section('content')
    <h1>Tienda</h1>
    @auth()
        @if(auth()->user()->is_admin)
        <a href="{{route('product.create')}}">Crear producto</a><br>
        @endif
    @endauth

    <ul>
        @forelse($products as $productItem)
    <li><a href="{{ route('product.show', $productItem)}}">{{ $productItem->title }}</a> <br>
    </li>
    @empty
    <li>No hay proyectos para mostrar</li>
    @endforelse
    </ul>
@endsection
