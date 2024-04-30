<?php

namespace App\Livewire\Manager\Tree;

use App\Models\Tree;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $nature;

    protected $rules = [
        'name' => 'required|unique:trees',
        'nature' => 'required|exists:natures,id',
    ];

    public function save(): void
    {
        $this->validate();

        try {
            Tree::query()->create(['nature_id' => $this->nature, 'name' => $this->name]);

            $this->dispatch('refreshTable');

            $this->dispatch('close-modal', modal: 'modal-create');
            $this->dispatch('showAlertSuccess', title: 'Sucesso', message: 'A árvore foi cadastrada com sucesso :)');
        } catch (\Exception $exception) {
            $this->dispatch('showAlertError', title: 'Error', message: 'Ocorreu um erro ao cadastrar as perguntas. Por favor, tente novamente.');
        }

        $this->reset();

        $this->dispatch('resetSelectForm');
    }

    public function render(): View
    {
        return view('livewire.manager.tree.form');
    }
}
