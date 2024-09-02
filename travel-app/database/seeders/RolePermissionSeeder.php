<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage cities',
            'manage hotels',
            'manage countries',
            'manage hotel bookings',
            'checkout hotels',
            'view hotel bookings'
        ];

        foreach($permissions as $permission){
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $customerRole = Role::firstOrCreate([
            'name' => 'customer'
        ]);

        $customerPermission = [
            'checkout hotels',
            'view hotel bookings'
        ];

        $customerRole->syncPermissions($customerPermission);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'avatar' => 'images/dummy_avatar.png',
            'password' => bcrypt('qwerty123')
        ]);

        $user->assignRole($superAdminRole);


    }
}
