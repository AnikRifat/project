<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'news_id' => '#mp-' . uniqid(),
            'key' => Str::random(10),
            'category_id' => fake()->randomElement([
                "1",
                "2",
                "3",
                "4",
                "5",
            ]),
            "category_name" => fake()->randomElement([
                "রাজনিতি",
                "শিক্ষা",
                "খেলাধুলা",
                "ব্যাবসা",
                "জাতীয়",
            ]),
            'author' => 'Admin',
            'content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>',
            'title' => fake()->text(),
            'image' => 'http://mpnews24bd.com/uploads/images/news/mpnews_image20221206085038.JPG',
            'status' => '1',
            'datetime' => '০৩ ডিসেম্বর, ২০২২',

        ];
    }
}
