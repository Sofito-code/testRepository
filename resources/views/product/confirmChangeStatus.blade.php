@extends('layouts.app')
@section('title','Tienda | ' . $product->title)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header">Confirmar</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($product->enabled == true)
                    <p>¿Seguro que quiere deshabilitar {{$product->title}}?</p> <br>
                    @else
                    <p>¿Seguro que quiere habilitar {{$product->title}}?</p> <br>
                    @endif

                    <a class="btn btn-success float-right" href="#" onclick="event.preventDefault();
            document.getElementById('enabled-form').submit();">Si</a>
                <a class="btn btn-outline-secondary" href="{{route('product.whiteList')}}">cancelar</a>
                    <form id="enabled-form" action="{{ route('product.updateState',$product->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="text" name= "id" value="{{$product->id}}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
