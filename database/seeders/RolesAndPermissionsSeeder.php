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
            ['name' => 'view_admin/users'],
            ['name' => 'create_users'],
            ['name' => 'edit_users'],
            ['name' => 'delete_users'],
            ['name' => 'view_admin/menus'],
            ['name' => 'create_menus'],
            ['name' => 'edit_menus'],
            ['name' => 'delete_menus'],
            ['name' => 'create_roles'],
            ['name' => 'delete_roles'],
            ['name' => 'edit_roles'],
            ['name' => 'view_admin/roles'],
            ['name' => 'create_permissions'],
            ['name' => 'view_admin/permissions'],
            ['name' => 'edit_permissions'],
            ['name' => 'delete_permissions'],
            // tambahkan permission lain sesuai kebutuhan
            ['name' => 'view_admin/dashboard'],
            ['name' => 'view_admin/produk'],
            ['name' => 'view_admin/kategori'],
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
            'view_admin/users',
            'create_users',
            'edit_users',
            'delete_users',
            'view_admin/menus',
            'create_menus',
            'edit_menus',
            'delete_menus',
            'view_admin/roles',
            'view_admin/permissions',
            // tambahkan permissions yang sesuai untuk Admin
            'view_admin/dashboard',
            'view_admin/produk',
            'view_admin/kategori',
        ]);

        // contoh: $role = Role::findByName('User');
        // $role->givePermissionTo(['view_users', 'edit_users']);

        // Assign role to user if needed
        // contoh: $user->assignRole('Admin');
    }
}
