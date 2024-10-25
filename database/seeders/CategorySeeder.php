<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Électronique'],
            ['name' => 'Vêtements'],
            ['name' => 'Livres'],
            ['name' => 'Maison et Jardin'],
            ['name' => 'Sports et Loisirs'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}