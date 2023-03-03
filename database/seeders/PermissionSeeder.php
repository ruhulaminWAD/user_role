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
        $profileManagement = [
            'Index Profile',
            'Create Profile',
            'Edit Profile',
            'Delete Profile',
        ];
        $userPermission = [
            'Index User',
            'Create User',
            'Edit User',
            'Delete User',
        ];

        // Admin Management Or Permission
        $admin_Module = Module::where('module_name', 'Admin Dashboard')->select('id')->first();
        Permission::updateOrCreate([
            'module_id' => $admin_Module->id,
            'permission_name' => $adminPermission[0],
            'permission_slug' => Str::slug($adminPermission[0]),
        ]);

        // Role Management Or Permission
        $role_Module = Module::where('module_name', 'Role Management')->select('id')->first();
        foreach ($rolePermission as  $role) {
            Permission::updateOrCreate([
                'module_id' => $role_Module->id,
                'permission_name' => $role,
                'permission_slug' => Str::slug($role),
            ]);
        }


        // Profile Management Or Permission
        $profileManage = Module::where('module_name', 'Profile Management')->select('id')->first();
        foreach ($profileManagement as  $role) {
            Permission::updateOrCreate([
                'module_id' => $profileManage->id,
                'permission_name' => $role,
                'permission_slug' => Str::slug($role),
            ]);
        }

        // User Management
        $userManage = Module::where('module_name', 'User Management')->select('id')->first();

        // for ($i=0; $i < count($userPermission); $i++) {
        //     Permission::updateOrCreate([
        //         'module_id' => $userManage->id,
        //         'permission_name' => $userPermission,
        //         'permission_slug' => Str::slug($userPermission[$i]),
        //     ]);
        // Ei error ta solve korte hobe
        // }

        foreach ($userPermission as  $role) {
            Permission::updateOrCreate([
                'module_id' => $userManage->id,
                'permission_name' => $role,
                'permission_slug' => Str::slug($role),
            ]);
        }

        // Page Builder seed
        $PageBuilder = [
            'Index Page',
            'Create Page',
            'Edit Page',
            'Delete Page',
        ];
        // Page Builder Or Permission
        $page_builder = Module::where('module_name', 'Page Builder')->select('id')->first();
        foreach ($PageBuilder as  $role) {
            Permission::updateOrCreate([
                'module_id' => $page_builder->id,
                'permission_name' => $role,
                'permission_slug' => Str::slug($role),
            ]);
        }

    }
}
