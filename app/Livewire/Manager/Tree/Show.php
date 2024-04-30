<?php

namespace App\Livewire\Manager\Tree;

use App\Models\Tree;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class Show extends Component
{
    #[Locked]
    public Tree $tree;

    public function showCreateQuestion(): void
    {
        $this->dispatch('showModal', alias: 'manager.tree.question.form', maxWidth: '2xl', params: $this->tree);
    }

    public function mount(Tree $tree): void
    {
        $this->tree = $tree;
    }

    public function render(): View
    {
        return view('livewire.manager.tree.show');
    }
}
