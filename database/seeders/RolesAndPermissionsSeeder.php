<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect(['admin', 'user']);
        $roles->each(fn ($r) => Role::create(['name' => $r]));
        $adminPermissions = collect(['admin resources', 'list product', 'show product', 'create product', 'edit product', 'delete product', 'list user', 'show user', 'create user', 'edit user', 'delete user', 'show profile', 'edit profile']);
        $adminPermissions->each(function ($p) {
            $permission = Permission::create(['name' => $p]);
            $permission->assignRole('admin');
        });
        $userPermissions = collect(['user resources', 'list product', 'show product', 'add to cart', 'show cart', 'edit cart', 'show profile', 'edit profile']);
        $userPermissions->each(function ($p) {
            $permission = Permission::firstWhere('name', $p) ?? Permission::create(['name' => $p]);
            $permission->assignRole('user');
        });
    }
}
