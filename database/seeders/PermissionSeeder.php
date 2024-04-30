<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        $roleAtendente = Role::create(['name' => 'atendente']);
        $roleDespacho = Role::create(['name' => 'despacho']);
        $roleSupervisao = Role::create(['name' => 'supervisao']);
        $roleStq = Role::create(['name' => 'stq']);
        $roleCertidoes = Role::create(['name' => 'certidoes']);
        $roleTecnica = Role::create(['name' => 'tecnica']);
        $roleSuperAdmin = Role::create(['name' => 'SuperAdmin']);





        $permEditarOcorrencias = Permission::create(['name' => 'editar ocorrências']);



        $roleAtendente->givePermissionTo($permEditarOcorrencias);
    }

}

