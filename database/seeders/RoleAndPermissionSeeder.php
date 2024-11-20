<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /* Create User */
        $user= User::create([
            'name'=> 'Master Admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make('123'),
            'remember_token' => Str::random(10),
            'email_verified_at'=>now(),
        ]);
        $role = Role::firstOrCreate(['name' => 'super-admin']);
        $user->assignRole($role);
        Role::create(['name' => 'user']);

        // create permissions
        $arrayOfPermissionNames = ['edit user', 'delete user', 'see user', 'Add Product', 'see role', 'create role'];
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web', 'created_at'=>now(), 'updated_at'=>now()];
        });
        

        Permission::firstOrCreate($permissions->toArray());
    }
}
