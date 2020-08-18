<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $fillable = ['title', 'slug', 'description', 'image', 'price'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
