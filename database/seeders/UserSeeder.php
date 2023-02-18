<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // Create the first super admin user
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'id' => '2',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'id' => '3',
            'name' => 'Creator',
            'email' => 'creator@admin.com',
            'password' => Hash::make('password'),
        ]);
        // Create 9 normal users
        for ($i = 4; $i <= 9; $i++) {
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }
        $superadmin = User::find(1);
        $admin = User::find(2);
        $creator = User::find(3);

        $superadminrole = Role::find(1);
        $adminrole = Role::find(2);
        $creatorrole = Role::find(3);

        $superadmin->assignRole($superadminrole);
        $admin->assignRole($adminrole);
        $creator->assignRole($creatorrole);
    }
}
