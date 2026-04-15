<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Role and Permissions',
                'subdomain' => null,
                'icon' => null,
                'order' => 99,
                'permission_view' => null,
                'parent_id' => null,
            ],
            [
                'name' => 'Role',
                'subdomain' => 'admin/roles',
                'icon' => 'paint-brush',
                'order' => 0,
                'permission_view' => 'view_admin/roles',
                'parent_id' => 1,
            ],
            [
                'name' => 'Permission',
                'subdomain' => 'admin/permissions',
                'icon' => 'key',
                'order' => 0,
                'permission_view' => 'view_admin/permissions',
                'parent_id' => 1,
            ],
            [
                'name' => 'Settings',
                'subdomain' => null,
                'icon' => null,
                'order' => 98,
                'parent_id' => null,
            ],
            [
                'name' => 'Users',
                'subdomain' => 'admin/users',
                'icon' => 'users',
                'order' => 0,
                'permission_view' => 'view_admin/users',
                'parent_id' => 4,
            ],
            [
                'name' => 'Menus',
                'subdomain' => 'admin/menus',
                'icon' => 'list-bullet',
                'order' => 0,
                'permission_view' => 'view_admin/menus',
                'parent_id' => 4,
            ],
            [
                'name' => 'Dashboard',
                'subdomain' => 'admin/dashboard',
                'icon' => 'home',
                'order' => 0,
                'permission_view' => 'view_admin/dashboard',
                'parent_id' => null,
            ],
            [
                'name' => 'Toko',
                'subdomain' => null,
                'icon' => null,
                'order' => 1,
                'permission_view' => null,
                'parent_id' => null,
            ],
            [
                'name' => 'Produk',
                'subdomain' => 'admin/produk',
                'icon' => 'circle-stack',
                'order' => 1,
                'permission_view' => 'view_admin/produk',
                'parent_id' => 8,
            ],
            [
                'name' => 'Database',
                'subdomain' => null,
                'icon' => null,
                'order' => 2,
                'permission_view' => null,
                'parent_id' => null,
            ],
            [
                'name' => 'Kategori',
                'subdomain' => 'admin/kategori',
                'icon' => 'tag',
                'order' => 1,
                'permission_view' => 'view_admin/kategori',
                'parent_id' => 10,
            ],
            // tambahkan menu lain sesuai kebutuhan
        ];

        foreach ($menus as $menu) {
            $menu['uuid'] = str()->uuid();
            Menu::create($menu);
        }
    }
}
