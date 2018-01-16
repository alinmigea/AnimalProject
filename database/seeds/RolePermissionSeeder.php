<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect([
            'admin' => [
                'create user',
                'update user',
                'delete user',
                'show user',
                'create animal',
                'update animal',
                'delete animal',
                'show animal',
            ],
            'owner' => [
                'update user',
                'show user',
                'update animal',
                'show animal',
            ],
        ]);

        $roles->each(function ($permissions, $role){

            $role = Role::create(['name' => $role]);

            collect($permissions)->each(function ($permission) use ($role){

                $permission = Permission::firstOrCreate(['name' => $permission]);
                $role->givePermissionTo($permission);
            });
        });
    }
}
