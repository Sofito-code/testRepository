<?php

namespace App\RolesAndPermissions\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name', 'slug', 'description', 'full-access',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany('App\RolesAndPermissions\Models\Permission')->withTimestamps();
    }
}
