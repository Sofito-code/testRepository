<?php

namespace App\Actions\Roles;

use Illuminate\Http\Request;
use App\RolesAndPermissions\Models\Role;

class StoreOrUpdateRole
{
    public static function execute(Request $request, Role $role): void
    {
        //if ($request->get('permission')) {
        $role->permissions()->sync($request->get('permission'));
        //}
        $role->save();
    }
}
