<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([

            'logo' => asset('uploads/images/logo.png'),
            'favicon' => asset('uploads/images/favicon.png'),
            'name' => 'newspaper',
            'description' => 'newspaper description',
            'phone' => '01456426854',
            'email' => 'email@email.com',
            'address' => 'address line 1',
        ]);
    }
}
