<?php

namespace Database\Seeders;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermission = [
            'Access Dashboard',
        ];
        $rolePermission = [
            'Index Role',
            'Create Role',
            'Edit Role',
            'Delete Role',
        ];
        $userPermission = [
            'Index User',
            'Create User',
            'Edit User',
            'Delete User',
        ];

        // Admin Management
        $admin_Module = Module::where('module_name', 'Admin Dashboard')->select('id')->first();
        Permission::updateOrCreate([
            'module_id' => $admin_Module->id,
            'permission_name' => $adminPermission[0],
            'permission_slug' => Str::slug($adminPermission[0]),
        ]);

        // Role Management
        $role_Module = Module::where('module_name', 'Role Management')->select('id')->first();
        foreach ($rolePermission as  $role) {
            Permission::updateOrCreate([
                'module_id' => $role_Module->id,
                'permission_name' => $role,
                'permission_slug' => Str::slug($role),
            ]);
        }

        // User Management
        $user_Module = Module::where('module_name', 'User Management')->select('id')->first();

        // for ($i=0; $i < count($userPermission); $i++) { 
        //     Permission::updateOrCreate([
        //         'module_id' => $user_Module->id,
        //         'permission_name' => $userPermission,
        //         'permission_slug' => Str::slug($userPermission[$i]),
        //     ]);
        // Ei error ta solve korte hobe
        // }

        foreach ($userPermission as  $role) {
            Permission::updateOrCreate([
                'module_id' => $user_Module->id,
                'permission_name' => $role,
                'permission_slug' => Str::slug($role),
            ]);
        }

    }
}
