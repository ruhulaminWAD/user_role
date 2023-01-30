<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  create an admin role $ assign all permission on it.
        $admin_permissions = Permission::select('id')->get();
        Role::updateOrCreate([
            'role_name' => 'Admin',
            'role_slug' => 'admin',
            'role_note' => 'Admin has all permissions',
            'is_deleteable' => false,
        ])->permissions()->sync($admin_permissions->pluck('id'));

        // create a user role
        Role::updateOrCreate([
            'role_name' => 'User',
            'role_slug' => 'user',
            'role_note' => 'User has limited permissions',
            'is_deleteable' => true,
        ]);
        // Jodi user er permission dite cay, tahole sync & pluck kore dite hobe
    }
}
