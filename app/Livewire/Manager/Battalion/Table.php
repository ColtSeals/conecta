<?php

namespace App\Livewire\Manager\Battalion;

use App\Models\Battalion;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search, $currentPage = 1, $perPage = 100, $sortOrder = 'desc';

    protected $listeners = ['refreshTable' => '$refresh'];

    public function deleteBattalion($battalionId)
    {
        $battalion = Battalion::find($battalionId);

        if ($battalion) {
            $battalion->delete();


            $this->dispatch('refreshComponent');
        }
    }

    public function render(): View
    {
        $query = Battalion::query();

        $query->orderBy('id', $this->sortOrder);

        $battalions = $query->paginate($this->perPage);

        return view('livewire.manager.battalion.table', ['battalions' => $battalions]);
    }
}
