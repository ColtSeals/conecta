<?php

namespace App\Livewire\Technique\User\Delete;

use App\Models\User;
use Livewire\Component;

class Form extends Component
{
    public $userId;
    public $identification, $patent, $level, $name, $nickname, $email, $email_verified_at, $license;
    public $state, $street, $city, $number, $neighborhood, $pluscode, $cep;

    protected $rules = [
        'identification' => 'required',
        'patent' => 'required',
        'level' => 'required',
        'name' => 'required',
        'nickname' => 'required',
        'email' => 'required|email',
        'license' => 'required',
        'state' => 'nullable',
        'street' => 'nullable',
        'city' => 'nullable',
        'number' => 'nullable',
        'neighborhood' => 'nullable',
        'pluscode' => 'nullable',
        'cep' => 'nullable',
    ];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->loadUserData();
    }

    public function delete(): void
    {
        $user = User::find($this->userId);

        if ($user) {
            $user->update(['active' => 0]);
            $this->dispatch('showAlertSuccess', title: 'Sucesso', message: 'O usuário foi deletado com êxito.');
        } else {
            $this->dispatch('showAlertError', title: 'Erro', message: 'Usuário não encontrado.');
        }
    }

    public function loadUserData()
    {
        $user = User::with('address')->findOrFail($this->userId);

        // Atribuindo valores diretamente às propriedades do componente
        $this->identification = $user->identification;
        $this->patent = $user->patent;
        $this->level = $user->level;
        $this->name = $user->name;
        $this->nickname = $user->nickname;
        $this->email = $user->email;
        $this->email_verified_at = $user->email_verified_at;
        $this->license = $user->license;

        // Atribuindo valores de endereço, se disponível
        if ($user->address) {
            $this->state = $user->address->state;
            $this->street = $user->address->street;
            $this->city = $user->address->city;
            $this->number = $user->address->number;
            $this->neighborhood = $user->address->neighborhood;
            $this->pluscode = $user->address->pluscode;
            $this->cep = $user->address->cep;
        }
    }

    public function render()
    {
        return view('livewire.technique.user.delete.form');
    }
}
