<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Website;
use Illuminate\Database\Seeder;
use NewsHasTagsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            // RoleSeeder::class,
            PermissionSeeder::class,
            WebsiteSeeder::class,
            // AdminSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            TagSeeder::class,

            NewsSeeder::class,
        ]);
    }
}
