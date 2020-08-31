<?php

namespace App\RolesAndPermissions\Traits;

trait UserTrait
{
    public function roles()
    {
        return $this->belongsToMany('App\RolesAndPermissions\Models\Role')->withTimestamps();
    }

    public function havePermission($route)
    {
        foreach ($this->roles as $role) {
            if ($role['full-access'] == 'yes') {
                return true;
            }
            foreach ($role->permissions as $permission) {
                if ($permission->slug == $route) {
                    return true;
                }
            }
        }
        return false;
    }
}
