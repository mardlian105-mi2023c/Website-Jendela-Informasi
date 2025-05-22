<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Sports']);
        Category::create(['name' => 'Ekonomi']);
        Category::create(['name' => 'Hiburan']);
        Category::create(['name' => 'Internasional']);
        Category::create(['name' => 'Pendidikan']);
    }
}