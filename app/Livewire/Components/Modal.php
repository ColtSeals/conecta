<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
{
    public $alias, $maxWidth, $params = [];

    #[On('showModal')]
    public function showModal($alias, $maxWidth, ...$params): void
    {
        $this->alias = $alias;
        $this->maxWidth = $maxWidth;
        $this->params = $params;

        $this->dispatch('showBootstrapModal');
    }

    #[On('resetModal')]
    public function resetModal(): void
    {
        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.components.modal');
    }
}
