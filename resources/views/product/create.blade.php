@extends('layouts.app')
@section('title','Crear producto | Chocoloco')
@section('content')
    <h1>Crear producto</h1>

    @include('custom.validationErrors')
    <form method="POST" action="{{route('product.store', $product)}}">
        @include('product.productForm',['btnText'=>'Guardar'])
    </form>
@endsection
