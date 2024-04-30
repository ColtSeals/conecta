<?php

namespace App\Livewire\Technique\User\Create;

use App\Livewire\Technique\User\Table;
use App\Models\Address;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Role;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Validate;


class Form extends Component
{
    public $id, $identification, $patent, $level, $nickname, $email, $email_verified_at, $license, $profile_photo_path, $active, $battalion;
    public $street, $number, $city, $state, $cep, $plusCode, $neighborhood, $reference;

    public $password = '';
    public $showPassword = false;

    public $roles = [];

    public function togglePasswordVisibility(): void
    {
        $this->showPassword = !$this->showPassword;
    }



    #[Validate('required', message: 'O campo nome é obrigatório.')]
    public $name = '';

    public function save(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'license' => 'required|string|max:255|unique:users,license',
            'password' => 'required|string|min:6',
        ]);

        $user = $this->createUser();
        if ($user) {
            $roleIds = [];
            foreach ($this->roles as $roleName => $selected) {
                if ($selected) {
                    $role = Role::where('name', $roleName)->first();
                    if ($role) {
                        $roleIds[] = $role->id;  // Utiliza o UUID
                    } else {
                        Log::error("Papel não encontrado: $roleName");
                    }
                }
            }

            if (!empty($roleIds)) {
                $user->roles()->sync($roleIds);
            }

            $this->dispatch('refreshTable')->to(Table::class);
        } else {
            $this->dispatch('error', ['message' => 'Erro ao criar usuário.']);
        }

        event(new \App\Events\UserEvent(['message' => 'Olá, mundo!']));

    }

    private function createUser(): User
    {
        return User::create([
            'name' => $this->name,
            'license' => $this->license,
            'password' => $this->password,
            'identification' => $this->identification,
            'patent' => $this->patent,
        ]);
    }





    public function render(): View
    {
       return view('livewire.technique.user.create.form');
    }
}
