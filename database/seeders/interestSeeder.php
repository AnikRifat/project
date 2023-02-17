<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;
use App\Models\Interest;

class InterestSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $tags = Tag::all();

        foreach ($users as $user) {
            // randomly select some tags as user's interests
            $interestTags = $tags->random(rand(1, 5));
            foreach ($interestTags as $tag) {
                Interest::create([
                    'user_id' => $user->id,
                    'tag_id' => $tag->id
                ]);
            }
        }
    }
}
