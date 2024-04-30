<?php

namespace App\Livewire\Manager\Battalion\Specialty;

use App\Models\BattalionSpecialty;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    #[Validate(['options.*.name' => 'required'], message: ['required' => 'O nome é obrigatório para essa opção.'])]
    #[Validate(['options.*.name' => 'string'], message: ['string' => 'O nome deve ser uma string.'])]
    #[Validate(['options.*.name' => 'unique:battalion_specialties'], message: ['unique' => 'Essa especialidade já está em uso. Escolha outra.'])]
    #[Validate(['options.*.name' => 'max:255'], message: ['max' => 'A especialidade não deve exceder 255 caracteres.'])]
    public $options = [];

    public function save(): void
    {
        $this->validate();

        try {
            $this->createSpecialties();

            $this->dispatch('refreshTable')->to(\App\Livewire\Manager\Battalion\Table::class);
            $this->dispatch('showAlertSuccess', title: 'Sucesso', message: 'O cadastro de todas as especialidades foi concluído com êxito.');
            $this->dispatch('hideModal');
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    private function createSpecialties(): void
    {
        foreach ($this->options as $option)
            BattalionSpecialty::query()->create(['name' => $option['name']]);
    }

    public function addOption(): void
    {
        $lastOption = end($this->options);

        if (!$lastOption || !empty($lastOption['name']))
            $this->options[] = ['name' => ''];
    }

    public function removeOption($index): void
    {
        $nextIndex = $index + 1;

        if (isset($this->options[$nextIndex]['question'])) {
            unset($this->options[$nextIndex]);
        } else {
            unset($this->options[$index]);
        }

        $this->options = array_values($this->options);

        $this->resetErrorBag();
    }

    public function mount(): void
    {
        $this->addOption();
    }

    public function render(): View
    {
        return view('livewire.manager.battalion.specialty.form');
    }
}
