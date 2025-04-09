<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'Sistemas']);
        $role2=Role::create(['name'=>'Reclutador']);
        $role3=Role::create(['name'=>'Coordinador']);
        $role4=Role::create(['name'=>'Juridico']);
        $role5=Role::create(['name'=>'Contabilidad']);

        Permission::create(['name'=>'nuevocolaborator'])->syncRoles([$role2]);

        Permission::create(['name'=>'uploadfiles'])->syncRoles([$role2]);
    }
}
