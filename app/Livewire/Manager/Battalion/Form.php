<?php

namespace App\Livewire\Manager\Battalion;

use App\Models\Address;
use App\Models\Battalion;
use App\Models\BattalionSpecialty;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    #[Validate('required', message: 'O campo nome é obrigatório.')]
    #[Validate('string', message: 'Por favor, insira uma string válida para o nome.')]
    #[Validate('unique:battalions', message: 'O nome deve ser único entre os batalhões.')]
    public $name = '';

    #[Validate('required', message: 'O campo nome é obrigatório.')]
    #[Validate('exists:battalion_specialties,id', message: 'O campo nome é obrigatório.')]
    public $specialty = '';

    #[Validate('required', message: 'O campo Comando de Policiamento é obrigatório.')]
    #[Validate('string', message: 'Por favor, insira uma string válida para a descrição.')]
    public $police_command = '';


    public function boot(): void
    {
        $this->dispatch('initAutocompleteGoogle');
    }



    public function save(): void
    {
        $this->validate();

        $this->createBattalion();

        $this->dispatch('refreshTable')->to(\App\Livewire\Manager\Battalion\Table::class);
        $this->dispatch('showAlertSuccess', title: 'Sucesso', message: 'O cadastro do Batalhão foi concluído com êxito.');
        $this->dispatch('hideModal');
    }


    private function createBattalion(): void
    {
        Battalion::query()->create([
            'specialty_id' => $this->specialty,
            'name' => $this->name,
            'police_command' => $this->police_command,
        ]);
    }

    public function mount(): void
    {
        $this->specialty = BattalionSpecialty::query()->first()?->id;
    }

    public function render(): View
    {
        return view('livewire.manager.battalion.form');
    }
}
