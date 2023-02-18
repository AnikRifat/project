<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin =  Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $creator = Role::create(['name' => 'Creator']);
        $user =  Role::create(['name' => 'User']);


        $permissions = Permission::all();
        $superadmin->givePermissionTo($permissions);
        $admin->givePermissionTo(['Add News', 'Edit News']);
    }
}
