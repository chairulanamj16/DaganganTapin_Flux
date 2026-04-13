<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'User'],
            // tambahkan role lain sesuai kebutuhan
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Permissions
        $permissions = [
            ['name' => 'view_users'],
            ['name' => 'create_users'],
            ['name' => 'edit_users'],
            ['name' => 'delete_users'],
            ['name' => 'view_menus'],
            ['name' => 'create_menus'],
            ['name' => 'edit_menus'],
            ['name' => 'delete_menus'],
            ['name' => 'create_roles'],
            ['name' => 'delete_roles'],
            ['name' => 'edit_roles'],
            ['name' => 'view_roles'],
            ['name' => 'create_permissions'],
            ['name' => 'view_permissions'],
            ['name' => 'edit_permissions'],
            ['name' => 'delete_permissions'],
            // tambahkan permission lain sesuai kebutuhan
            ['name' => 'view_dashboard'],
            ['name' => 'view_produk'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // Assign permissions to roles
        $role = Role::findByName('Admin');
        $role->givePermissionTo([
            'create_roles',
            'edit_roles',
            'delete_roles',
            'create_permissions',
            'edit_permissions',
            'delete_permissions',
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
            'view_menus',
            'create_menus',
            'edit_menus',
            'delete_menus',
            'view_roles',
            'view_permissions',
            // tambahkan permissions yang sesuai untuk Admin
            'view_dashboard',
            'view_produk',
        ]);

        // contoh: $role = Role::findByName('User');
        // $role->givePermissionTo(['view_users', 'edit_users']);

        // Assign role to user if needed
        // contoh: $user->assignRole('Admin');
    }
}
