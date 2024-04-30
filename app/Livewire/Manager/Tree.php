<?php

namespace App\Livewire\Manager;

use Illuminate\View\View;
use Livewire\Component;

class Tree extends Component
{
    public function showTree(): void
    {
        $this->dispatch('showModal', alias: 'manager.tree.form', maxWidth: 'xl');
    }


    public function render(): View
    {
        return view('livewire.manager.tree');
    }
}
