<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Criação do primeiro usuário com todos os roles
        $user1 = User::create([
            'name' => 'admin',
            'license' => 'admin',
            'identification' => 'Militar',
            'patent' => 'CB-PM',
            'password' => 'copom',
        ]);

        // Atribuir todos os roles disponíveis ao primeiro usuário
        $allRoles = Role::all();
        $user1->roles()->sync($allRoles->pluck('id'));  // Use pluck para obter apenas os IDs dos roles

        // Definindo outros usuários com roles específicos ou sem roles
        $users = [
            [
                'name' => 'Ullmann S',
                'license' => '105763',
                'identification' => 'Militar',
                'patent' => '1º SGT-PM',
                'password' => '105763',
                'roles' => ['manager']  // Exemplo de atribuição de um role específico
            ],
            [
                'name' => 'Luanque dos Santos',
                'license' => '152846',
                'identification' => 'Militar',
                'patent' => 'CB-PM',
                'password' => '152846',
                'roles' => ['manager', 'atendent']
            ],
            [
                'name' => 'TESTE S',
                'license' => '00000',
                'identification' => 'Militar',
                'patent' => 'TESTE-PM',
                'password' => '00000',
                'roles' => []  // Este usuário não terá nenhum role atribuído
            ],
        ];

        foreach ($users as $userDetails) {
            $roles = $userDetails['roles'] ?? null;  // Verifica se há roles definidos
            unset($userDetails['roles']);  // Remove os roles do array para evitar erro na criação do usuário

            $user = User::create($userDetails);

            // Se existirem roles definidos, associá-los ao usuário
            if (!empty($roles)) {
                $roleIds = Role::whereIn('name', $roles)->get()->pluck('id');
                $user->roles()->sync($roleIds);
            }
        }
    }
}
