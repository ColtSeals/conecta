<?php

namespace App\Livewire\Manager;

use Illuminate\View\View;
use Livewire\Component;


class Battalion extends Component
{


    public function showSpecialty(): void
    {
        $this->dispatch('showModal', alias: 'manager.battalion.specialty.form', maxWidth: 'xl');
    }

    public function showBattalion(): void
    {
        $this->dispatch('showModal', alias: 'manager.battalion.form', maxWidth: '2xl');
    }

    public function render(): View
    {
        return view('livewire.manager.battalion');
    }
}
