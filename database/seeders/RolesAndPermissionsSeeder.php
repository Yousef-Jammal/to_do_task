<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit task']);
        Permission::create(['name' => 'delete task']);
        Permission::create(['name' => 'read task']);
        Permission::create(['name' => 'update task']);
        Permission::create(['name' => 'admin-access']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        // create roles and assign created permissions
        
        $role = Role::create(['name' => 'user'])
            ->givePermissionTo(['read task', 'update task']);

        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
    }
}