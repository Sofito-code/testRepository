@extends('layouts.app')
@section('title','Crear producto | Chocoloco')
@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-offset-3">
                <img class="img-responsive menu-thumbnails" style="width:331.7px;height:429px;" src="{{ asset('images/logoC.png') }}"/>
            </div>
            <div class="col">
                <div class="card border-success">
                    <div class="card-header"><h4 class="text-center">{{ __('Crear un producto') }}</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{route('product.store', $product)}}" enctype="multipart/form-data">
                            @include('product.productForm',['btnText'=>'Guardar'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
