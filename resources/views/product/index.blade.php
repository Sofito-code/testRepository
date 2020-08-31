@extends('layouts.app')
@section('title','Tienda | Chocoloco')
@section('content')

<div class="container">
    <h1 class="text-center">Tienda</h1>

    <div class="row">
        <div class="col-sm-2">
            @include('custom.column')
        </div>

        <ul style="padding-left: 0px; width: 924px;">
            @if ($search)
            <div class="alert alert-light" role="alert">
                Los resultados de tu busqueda '{{$search}}' son:
            </div>
            @endif
            <div class="row">
            @forelse($products as $productItem)
                @if($productItem['enabled']==false)
                    @continue
                @endif
            <div class="col-sm-4 " style="padding-top: 15px; padding-bottom: 15px;">
                <div class="card border-success text-center" style="width: 18rem;">
                    <img src="images/products/{{$productItem->image }}" class="card-img-top" alt="{{$productItem->image}}" style="height: 17.9rem;width: 17.9rem; object-fit:contain">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $productItem->title }}</h5>
                        <a href="{{ route('product.show', $productItem)}}" class="btn btn-success">Ver detalles</a>
                        </div>
                    </div>
                </div>
            @empty
                <li>No hay productos para mostrar</li>
            @endforelse
        </div>
        </ul>
    </div>
</div>
@endsection
