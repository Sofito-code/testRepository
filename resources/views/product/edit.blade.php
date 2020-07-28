@extends('layouts.app')
@section('title','Editar | '.$product->title)
@section('content')
    <h2>Editar:{{$product->title}}</h2>

    @include('custom.validationErrors')
    <form method="POST" action="{{route('product.update', $product)}}">
        @method('PATCH')
        @include('product.productForm',['btnText'=>'Actualizar'])
    </form>
@endsection
