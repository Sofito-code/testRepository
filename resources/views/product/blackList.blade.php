@extends('layouts.app')
@section('title','Tienda | Productos deshabilitados')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card border-danger">
                <div class="card-header"><h2>Lista de productos deshabilitados</h2></div>

                <div class="card-body">
                    <a href="{{route('product.whiteList')}}" class="btn btn-primary float-right">
                        Ver productos habilitados
                    </a><br><br>
                    @include('custom.message')
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            @if($product['enabled']==true)
                                @continue
                            @endif
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{$product->title}}</td>
                                <td>{{$product->slug}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td><a class="btn btn-outline-secondary" href="{{route('product.show',$product)}}">ver</a></td>
                                <td><a class="btn btn-outline-success" href="{{route('product.changeState', $product->id)}}">habilitar</a></td>
                                <td><a class="btn btn-outline-danger" href="{{route('product.confirmDestroy',$product)}}">eliminar</a></td>
                            </tr>

                            @endforeach

                        </tbody>
                      </table>

                      {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
