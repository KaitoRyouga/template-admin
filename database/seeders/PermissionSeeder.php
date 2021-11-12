<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::where('name', 'Administrator')->first();
        $collabRole = Role::where('name', 'Collaborator')->first();

        if (empty($adminRole)) {
            $adminRole = Role::create(['name' => 'Administrator', 'guard_name' => 'admin']);
        }

        if (empty($collabRole)) {
            $collabRole = Role::create(['name' => 'Collaborator', 'guard_name' => 'admin']);
        }

        $allPermission = config('permission.list');

        $listPermission = [];
        foreach ($allPermission as $key => $value) { 
            foreach ($value as $k => $v) {
                $listPermission[count($listPermission)]['name'] = $v; 
                $listPermission[count($listPermission) - 1]['guard_name'] = 'admin';
            }
        }

        Permission::insert($listPermission);

        $listPermission = Permission::pluck('name')->toArray();

        $adminRole->syncPermissions($listPermission);
        $collabRole->syncPermissions($listPermission);
    }
}
