<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $fillable = ['title', 'slug', 'description', 'image', 'price', 'category_id', 'quantity', 'main_slider'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
