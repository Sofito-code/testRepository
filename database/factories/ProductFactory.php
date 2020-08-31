<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4, false),
        'slug' => Str::random(11),
        'category_id' => rand(1, 2),
        'description' => $faker->text,
        'specs' => Str::random(40),
        'image' => 'defaultImage.png',
        'price' => rand(1000, 5000),
        'enabled' => true,
        'main_slider' => 'No',
        'created_at' => now(),
        'updated_at' => now()
    ];
});
