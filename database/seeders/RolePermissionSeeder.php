<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'manage categories',
            'manage packages',
            'manage transactions',
            'manage package banks',
            'checkout package',
            'view orders',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $customerRole = Role::firstOrCreate(['name' => 'customer']);
        $customerPermissions = ['checkout package', 'view orders'];
        $customerRole->syncPermissions($customerPermissions);

        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdminRole->syncPermissions(Permission::all()); // Assign all permissions to super_admin

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'phone_number' => '6283874723607',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($superAdminRole);
        $user->syncPermissions(Permission::all()); // Ensure user has all permissions
    }
}
