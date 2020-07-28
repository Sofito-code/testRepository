<form action="{{$route}}" method="POST">
    @method('PUT')
    @csrf
    <div class="container">
        <h3>Información requerida</h3>
    </div>
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control"
        id="name" name="name" value="{{ old('nombre', $role->name ?? 'nombre')}}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug"
         id="slug" value="{{ old('slug', $role->slug ?? 'slug')}}">
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" name="description"
         id="description" rows="2">{{ old('description',$role->description ?? 'description')}}</textarea>
    </div>
    {{-- placeholder="..." --}}
    <hr>
    {{-- radios --}}
    <h3>Accesibilidad total</h3>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="full-accessYes" name="full-access"
         class="custom-control-input" value="yes"
         @if($role['full-access']=='yes')
             checked
         @elseif(old('full-access')=='yes')
             checked
         @endif>
        <label class="custom-control-label" for="full-accessYes">Si</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="full-accessNo" name="full-access"
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
        <input type="checkbox" class="custom-control-input"
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
    <input class="btn btn-primary" type="submit" value={{$button}}>
</form>
