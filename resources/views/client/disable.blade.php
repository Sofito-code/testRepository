@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2>Lista de clientes deshabilitados</h2></div>

                <div class="card-body">
                    <a href="{{route('client.index')}}" class="btn btn-primary float-right">
                        Ver clientes habilitados
                    </a><br><br>
                    @include('custom.message')
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th colspan="2"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            @if($client['is_admin']==true || $client['enabled']==true || $client['email_verified_at']==null)
                                @continue
                            @endif
                            <tr>
                                <th scope="row">{{$client->id}}</th>
                                <td>{{$client->name}}</td>
                                <td>{{$client->address}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->email}}</td>
                                <td><a class="btn btn-outline-secondary" href="{{route('client.show',$client->id)}}">ver</a></td>
                                <td><a class="btn btn-outline-success" href="{{route('client.changeState',$client->id)}}">habilitar</a></td>
                            </tr>

                            @endforeach

                        </tbody>
                      </table>

                      {{$clients->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
