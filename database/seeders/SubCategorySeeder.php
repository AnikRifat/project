<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Subcategory 1',
                'thumbnail' => 'thumbnail1.jpg',
                'order' => 1,
                'parent_id' => 3,
            ],
            [
                'name' => 'Subcategory 2',
                'thumbnail' => 'thumbnail2.jpg',
                'order' => 2,
                'parent_id' => 1,
            ],
            [
                'name' => 'Subcategory 3',
                'thumbnail' => 'thumbnail3.jpg',
                'order' => 3,
                'parent_id' => 1,
            ],
            [
                'name' => 'Subcategory 4',
                'thumbnail' => 'thumbnail4.jpg',
                'order' => 4,
                'parent_id' => 3,
            ],
            [
                'name' => 'Subcategory 5',
                'thumbnail' => 'thumbnail5.jpg',
                'order' => 5,
                'parent_id' => 2,
            ],
            [
                'name' => 'Subcategory 6',
                'thumbnail' => 'thumbnail6.jpg',
                'order' => 6,
                'parent_id' => 2,
            ],
        ];

        foreach ($categories as $category) {
            SubCategory::create($category);
        }
    }
}
