<?php

namespace App\RolesAndPermissions\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\RolesAndPermissions\Models\Role')->withTimestamps();
    }
}
