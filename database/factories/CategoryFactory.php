<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement([
                "রাজনিতি",
                "শিক্ষা",
                "খেলাধুলা",
                "ব্যাবসা",
                "জাতীয়",
            ]),
            'status' => '1',
            'key' => Str::random(10),
        ];
    }
}
