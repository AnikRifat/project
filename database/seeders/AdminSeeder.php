<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '2',
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$kWqJ/wyGHwzIcsmHYfgqG.wClUfgthY8lTqRtSNTGu9mEGDxQ14su', //password,
        ]);
        $admin = User::find(2);
        $admin->givePermissionTo(['Add News', 'Delete News']);
        // $permission = Permission::all();

    }
}
