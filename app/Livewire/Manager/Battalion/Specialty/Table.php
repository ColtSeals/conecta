<?php

namespace App\Livewire\Manager\Battalion\Specialty;

use App\Models\Battalion;
use App\Models\BattalionSpecialty;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search, $currentPage = 1, $perPage = 100, $sortOrder = 'desc';

    protected $listeners = ['refreshTable' => '$refresh'];

    public function deleteSpecialty($specialtyId)
    {
        $specialty = BattalionSpecialty::find($specialtyId);

        if ($specialty) {
            $specialty->delete();


            $this->dispatch('refreshComponent');
        }
    }


    public function render(): View
    {
        $query = BattalionSpecialty::query();

        $query->orderBy('id', $this->sortOrder);

        $specialties = $query->paginate($this->perPage);

        return view('livewire.manager.battalion.specialty.table', ['specialties' => $specialties]);
    }
}
