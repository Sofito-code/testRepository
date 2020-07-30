<?php

namespace App\Actions;

use Illuminate\Http\Request;
use App\RolesAndPermissions\Models\Role;
use App\RolesAndPermissions\Models\Permission;

class ShowOrEditRole
{
    public static function execute(Role $role)
    {
        $permissions_role = [];
        foreach ($role->permissions as $permissions) {
            $permissions_role[] = $permissions->id;
        }
        return $permissions_role;
    }
}
