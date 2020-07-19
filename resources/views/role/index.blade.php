@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Lista de Roles</h2></div>

                <div class="card-body">

                    <a href="{{route('role.create')}}" class="btn btn-primary float-right">
                        Crear
                    </a><br><br>
                    @include('custom.message')
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Full-access</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $roleItem)
                            <tr>
                                <th scope="row">{{$roleItem->id}}</th>
                                <td>{{$roleItem->name}}</td>
                                <td>{{$roleItem->description}}</td>
                                <td>{{$roleItem->slug}}</td>
                                <td>{{$roleItem['full-access']}}</td>
                                <td><a class="btn btn-outline-secondary" href="{{route('role.show',$roleItem->id)}}">ver</a></td>
                                <td><a class="btn btn-outline-success" href="{{route('role.edit',$roleItem->id)}}">editar</a></td>
                                <td><a class="btn btn-outline-danger" href="{{route('role.destroy',$roleItem->id)}}">eliminar</a></td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                      {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
