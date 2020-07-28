<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    // protected $guarded=['id','created_at','updated_at'];faltan permosis de adm
    protected $fillable = ['title', 'URL', 'description', 'price'];
    public function getRouteKeyName()
    {
        return 'URL';
    }
}
