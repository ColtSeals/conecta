<?php

namespace App\Livewire\Technique\User\Edit;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class Form extends Component
{
    public $userId, $name, $license, $identification, $level, $patent;
    public $roles = [];
    public $password = '';
    public $showPassword = false;

    public function mount($userId): void
    {
        $this->loadUserData($userId);
    }

    public function loadUserData($userId): void
    {
        $user = User::with('roles')->findOrFail($userId['data']['id']);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->license = $user->license;
        $this->identification = $user->identification;
        $this->patent = $user->patent;

        $allRoles = Role::all();
        foreach ($allRoles as $role) {
            $this->roles[$role->id] = $user->roles->contains('id', $role->id);
        }
    }


    public function save(): void
    {
        $userData = [
            'name' => $this->name,
            'license' => $this->license,
            'identification' => $this->identification,
            'patent' => $this->patent,
        ];

        // Verifica se a senha não está vazia
        if (!empty($this->password)) {
            $userData['password'] = Hash::make($this->password);
        }

        User::where('id', $this->userId)->update($userData);

        $user = User::find($this->userId);
        $user->roles()->sync(array_keys(array_filter($this->roles)));

        $this->dispatch('refreshTable');
        $this->dispatch('showAlertSuccess', ['title' => 'Sucesso', 'message' => 'O Usuário foi editado com êxito']);
        $this->dispatch('hideModal');
    }

    public function render()
    {
        return view('livewire.technique.user.edit.form');
    }
}
