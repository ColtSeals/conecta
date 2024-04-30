<?php

namespace App\Livewire\Config\Role;

use Livewire\Component;
use Session;

class Form extends Component
{
    public $selectedRole = '';

    public function save()
    {
        $this->validate([
            'selectedRole' => 'required|exists:roles,name'
        ]);

        Session::push('selectedRole', $this->selectedRole);

        if ($this->selectedRole == 'dispatcher') {
            return $this->redirectRoute('config.battalion');
        }

        return $this->redirectRoute('dashboard');
    }

    public function render()
    {
        return view('livewire.config.role.form');
    }
}
