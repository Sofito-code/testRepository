@extends('layouts.app')
@section('title','Roles |' . $role->name)
@section('content')
<div class="container">
    <h1 class="text-center" style="padding-bottom: 10px">Rol</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('role.update' , $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control"
                            id="name" name="name" value="{{ old('name', $role->name)}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug"
                             id="slug" value="{{ old('slug',$role->slug)}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea readonly class="form-control" name="description"
                             id="description" rows="2">{{ old('description',$role->description)}}</textarea>
                        </div>
                        {{-- placeholder="..." --}}
                        <hr>
                        {{-- radios --}}
                        <h3>Accesibilidad total</h3>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input disabled type="radio" id="full-accessYes" name="full-access"
                             class="custom-control-input" value="yes"
                             @if($role['full-access']=='yes')
                                 checked
                             @elseif(old('full-access')=='yes')
                                 checked
                             @endif>
                            <label class="custom-control-label" for="full-accessYes">Yes</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input disabled type="radio" id="full-accessNo" name="full-access"
                            class="custom-control-input" value="no"
                            @if($role['full-access']=='no')
                                 checked
                             @elseif(old('full-access')=='no')
                                 checked
                             @endif>
                            <label class="custom-control-label" for="full-accessNo">No</label>
                          </div>
                        <hr>
                        {{-- checkBox --}}
                        <h3>Lista de permisos</h3>

                        @foreach($permissions as $permissionItem)
                        <div class="custom-control custom-checkbox">
                            <input disabled type="checkbox" class="custom-control-input"
                            id="permission_{{$permissionItem->id}}" value="{{$permissionItem->id}}"
                            name="permission[]"

                            @if(is_array($permissions_role) && in_array("$permissionItem->id", $permissions_role))
                                checked
                            @elseif( is_array(old('permission')) && in_array("$permissionItem->id", old('permission')))
                                checked
                            @endif
                            >
                            <label class="custom-control-label" for="permission_{{$permissionItem->id}}">
                                {{$permissionItem->id}}
                                -
                                {{$permissionItem->name}}
                                <em>({{$permissionItem->description}})</em>
                            </label>
                        </div>
                        @endforeach

                        <hr>
                        <a class="btn btn-outline-success" href="{{route('role.edit',$role->id)}}">Editar</a>
                        <a class="btn btn-outline-secondary" href="{{route('role.index')}}">Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
