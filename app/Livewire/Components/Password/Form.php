<?php

namespace App\Livewire\Components\Password;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Form extends Component
{
    public $currentPassword;
    public $newPassword;
    public $confirmNewPassword;

    protected function rules()
    {
        return [
            'currentPassword' => 'required',
            'newPassword' => ['required', 'different:currentPassword', Password::defaults()],
            'confirmNewPassword' => 'required|same:newPassword',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function changePassword()
    {
        $this->validate();

        if (!Hash::check($this->currentPassword, Auth::user()->password)) {
            $this->addError('currentPassword', 'A senha atual não está correta.');
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($this->newPassword)
        ]);

        $this->dispatch('passwordUpdated');
        $this->reset('currentPassword', 'newPassword', 'confirmNewPassword');

        session()->flash('success', 'Senha alterada com sucesso.');
    }

    public function render()
    {
        return view('livewire.components.password.form');
    }
}

