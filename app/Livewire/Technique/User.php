<?php

namespace App\Livewire\Technique;

use Livewire\Component;

class User extends Component
{
    public function render()
    {
        return view('livewire.technique.user');
    }

    public function showEdit(): void
    {
        $this->dispatch('showModal', alias: 'technique.user.create.form', maxWidth: 'xl');
    }


    public function showUser(): void
    {
        $this->dispatch('showModal', alias: 'technique.user.create.form', maxWidth: 'xxl');
    }
}
