@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ><h2>Create Role</h2></div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('role.store')}}" method="POST">
                        @csrf
                        <div class="container">
                            <h3>Required Data</h3>
                        </div>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control"
                            id="name" name="name" value="{{ old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea class="form-control" name="description"
                             id="description" rows="2">{{ old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug"
                             id="slug" value="{{ old('slug')}}">
                        </div>
                        {{-- placeholder="..." --}}
                        <hr>
                        {{-- radios --}}
                        <h3>Full access</h3>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="full-accessYes" name="full-access"
                             class="custom-control-input" value="yes"
                             @if(old('full-access')=='yes')
                                 checked
                             @endif>
                            <label class="custom-control-label" for="full-accessYes">Yes</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="full-accessNo" name="full-access"
                            class="custom-control-input" value="no"
                            @if(old('full-access') =='no')
                             checked
                            @endif
                            @if(old('full-access') === null)
                              checked
                            @endif>
                            <label class="custom-control-label" for="full-accessNo">No</label>
                          </div>
                        <hr>
                        {{-- checkBox --}}
                        <h3>Permission List</h3>

                        @foreach($permissions as $permissionItem)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                            id="permission_{{$permissionItem->id}}" value="{{$permissionItem->id}}"
                            name="permission[]"
                            @if( is_array(old('permission')) && in_array("$permissionItem->id", old('permission')))
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
                        <input class="btn btn-primary" type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
