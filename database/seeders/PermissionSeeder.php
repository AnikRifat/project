<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Review News']);
        Permission::create(['name' => 'Add News']);
        Permission::create(['name' => 'Edit News']);
        Permission::create(['name' => 'Delete News']);
        Permission::create(['name' => 'Add Category']);
        Permission::create(['name' => 'Edit Category']);
        Permission::create(['name' => 'Add tags']);
        Permission::create(['name' => 'Edit tags']);
    }
}
