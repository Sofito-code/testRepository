@extends('layouts.app')
@section('title','Cliente | ' . $client->name )
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-offset-3">
            <img class="img-responsive menu-thumbnails" style="width:331.7px;height:429px;" src="/images/logos/logoC.png"/>
        </div>
        <div class="col">
            <h1 class="text-center" style="padding-bottom: 10px">Editar usuario</h1>
            <div class="card border-success">
                <ul class="list-group list-group-flush align-items-center">
                    <li class="list-group-item"><h3>Nombre: {{$client->name}}</h3></li>
                    <li class="list-group-item"><h3>Direccion: {{$client->address}}</h3></li>
                    <li class="list-group-item"><h3>Celular: {{$client->phone}}</h3></li>
                    <li class="list-group-item"><h3>Correo: {{$client->email}}</h3></li>
                </ul>
                <div class="card-body">
                    @include('custom.message')
                    <form action="{{route('client.update',$client)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <h4 for="address">Rol</h4>
                            <select class="form-control" name="roles" id="roles">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}"
                                    @isset($client->roles[0]->name)
                                        @if ($role->name == $client->roles[0]->name)
                                            selected
                                        @endif
                                    @endisset
                                >{{$role->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <hr>
                        <input class="btn btn-primary" type="submit" value="Guardar">
                    <a class="btn btn-outline-secondary float-right" href="{{route('client.changeState', $client->id)}}">{{$enabledButton}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
