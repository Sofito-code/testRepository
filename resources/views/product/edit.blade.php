@extends('layouts.app')
@section('title','Editar | '.$product->title)
@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-offset-3">
                <img class="img-responsive menu-thumbnails" style="width:331.7px;height:429px;" src="/images/logos/logoC.png"/>
            </div>
            <div class="col">
                <h1 class="text-center" style="padding-bottom: 10px">Editar producto</h1>
                <div class="card border-success">
                    <div class="card-body">
                        <form method="POST" action="{{route('product.update', $product)}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @include('product.productForm',['btnText'=>'Actualizar'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
