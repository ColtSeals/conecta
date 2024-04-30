<?php

namespace App\Livewire\Manager\Nature;

use App\Models\BattalionSpecialty;
use App\Models\Nature;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search, $currentPage = 1, $perPage = 100, $sortOrder = 'desc';

    protected $listeners = ['refreshTable' => '$refresh'];

    public function deleteNature($natureId)
    {
        $nature = Nature::find($natureId);

        if ($nature) {
            $nature->delete();


            $this->dispatch('refreshComponent');
        }
    }

    public function render(): View
    {
        $query = Nature::query();

        if ($this->search) {
            $query->where('code', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description', 'LIKE', '%' . $this->search . '%');
        }

        $query->orderBy('id', $this->sortOrder);

        $natures = $query->paginate($this->perPage);

        return view('livewire.manager.nature.table', ['natures' => $natures]);
    }

    public function toggleNatureStatus($natureId): void
    {
        $nature = \App\Models\Nature::findOrFail($natureId);

        $nature->active = !$nature->active;
        $nature->save();
        $this->dispatch('refreshTable')->to(\App\Livewire\Manager\Nature\Table::class);

    }


}
