<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Arepas',
            'slug' => 'arepas',
            'description' => 'Ricas arepas',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Category::create([
            'name' => 'Tortas',
            'slug' => 'tortas',
            'description' => 'Ricas tortas',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
