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
                    <p>¿Seguro que quiere eliminar permanentemente {{$product->title}}?</p><br>

                    <a class="btn btn-danger float-right" href="#" onclick="event.preventDefault();
                        document.getElementById('enabled-form').submit();">Eliminar</a>
                    <a class="btn btn-outline-secondary" href="{{route('product.index')}}">cancelar</a>
                    <form id="enabled-form" action="{{ route('product.destroy',$product) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                        <input type="text" name= "id" >
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
