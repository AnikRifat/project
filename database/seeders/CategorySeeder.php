<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Category 1',
                'thumbnail' => 'category1.jpg',
                'order' => 1,
            ],
            [
                'name' => 'Category 2',
                'thumbnail' => 'category2.jpg',
                'order' => 2,
            ],
            [
                'name' => 'Category 3',
                'thumbnail' => 'category3.jpg',
                'order' => 3,
            ],
        ];

        // Loop through the categories and insert them into the database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
