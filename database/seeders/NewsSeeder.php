<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get all categories, subcategories, and tags
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $tags = Tag::all();

        // Loop through and insert 50 news items
        for ($i = 0; $i < 50; $i++) {
            $category = $faker->randomElement($categories);
            $subcategory = $faker->randomElement($subcategories);
            $tag = $faker->randomElement($tags);

            DB::table('news')->insert([
                'title' => $faker->sentence,
                'thumbnail' => $faker->imageUrl(),
                'category_id' => $category->id,
                'sub_category_id' => $subcategory->id,
                'tag_id' => $tag->id,
                'source_url' => $faker->url,
                'creator_id' => $faker->numberBetween(1, 2),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut quam vitae ipsum dignissim fringilla. Sed ut magna eget libero iaculis imperdiet. Donec auctor nunc ut augue blandit condimentum. Fusce sit amet justo ut orci fermentum pulvinar in eget sapien. Fusce a semper libero, sed porttitor ex. Sed sagittis lorem id elit tristique, ac malesuada sapien accumsan. Fusce mollis, nunc sit amet venenatis sagittis, lectus nulla tristique enim, eu blandit velit velit eget augue. Nam mollis mi vel malesuada faucibus. Donec ultrices dolor vitae risus malesuada, quis varius nibh vehicula. Sed scelerisque tempor est non luctus.',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut quam vitae ipsum dignissim fringilla.',
                'views' => $faker->numberBetween(100, 1000),
                'status' => $faker->randomElement(['published', 'drafted', 'deleted', 'pending']),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now')
            ]);
        }
    }
}
