<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        $categories = [
            ['name' => 'Comportement'],
            ['name' => 'Soin'],
            ['name' => 'Nutrition']
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']], 
                $category
            );
        }
    }
}