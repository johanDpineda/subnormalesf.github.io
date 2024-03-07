<?php

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
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Centro de Inteligencia']);
        $role3 = Role::create(['name'=>'Facturacion']);
        $role4 = Role::create(['name'=>'Caminante']);
        $role5 = Role::create(['name'=>'Grupo Social']);



        Permission::create(['name'=>'dashboard'])->syncRoles([$role1,$role2,$role5]);
        Permission::create(['name'=>'users.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'userscaminantes.index'])->syncRoles([$role2,$role1]);
        Permission::create(['name'=>'Caminantes.index'])->syncRoles([$role2,$role4,$role1]);
        Permission::create(['name'=>'controlTerrenos.index'])->syncRoles([$role2,$role5,$role1]);
        Permission::create(['name'=>'CrearSubNormal.index'])->syncRoles([$role1,$role2,$role3,$role5]);

        // permisos zonas SubNormales


    }
}
