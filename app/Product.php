<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $fillable = ['title', 'URL', 'description', 'image', 'price'];
    public function getRouteKeyName()
    {
        return 'URL';
    }
}
