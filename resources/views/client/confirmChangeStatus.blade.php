@extends('layouts.app')
@section('title','Cliente |' . $client->name)
@section('content')
<div class="container">
    <h1 class="text-center">Confirmar</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($client->enabled == true)
                        <p>¿Seguro que quiere deshabilitar a {{$client->name}}?</p><br>
                    @else
                        <p>¿Seguro que quiere habilitar a {{$client->name}}?</p><br>
                    @endif

                    <a class="btn btn-success float-right" href="#" onclick="event.preventDefault();
            document.getElementById('enabled-form').submit();">Si</a>
                <a class="btn btn-outline-secondary" href="{{route('client.index')}}">cancelar</a>
                    <form id="enabled-form" action="{{ route('client.updateState',$client->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                        <input type="text" name= "id" value="{{$client->id}}">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
