@extends('layouts.app')
@section('title','Cliente | ' . $client->name )
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-offset-3">
            <img class="img-responsive menu-thumbnails" style="width:331.7px;height:429px;" src="/images/logos/logoC.png"/>
        </div>
        <div class="col">
            <h1 class="text-center" style="padding-bottom: 10px">Informacion del usuario</h1>
            <div class="card border-success">
                <ul class="list-group list-group-flush align-items-center">
                    <li class="list-group-item"><h3>Nombre: {{$client->name}}</h3></li>
                    <li class="list-group-item"><h3>Direccion: {{$client->address}}</h3></li>
                    <li class="list-group-item"><h3>Celular: {{$client->phone}}</h3></li>
                    <li class="list-group-item"><h3>Correo: {{$client->email}}</h3></li>
                    <li class="list-group-item"><h3>Rol:
                        @isset($client->roles[0]->name)
                        {{$client->roles[0]->name}}
                    @endisset</h3></li>
                </ul>
                <a class="btn btn-outline-success float-right" href="{{route('client.edit', $client)}}">Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection
