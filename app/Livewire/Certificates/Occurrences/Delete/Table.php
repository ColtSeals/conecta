<?php

namespace App\Livewire\Certificates\Occurrences\Delete;

use App\Models\Battalion;
use App\Models\Occurrence;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination;

    protected $listeners = ['refreshTable' => '$refresh',
        'userSelected' => 'handleUserSelection'];

    public $selectedUserId;

    public $userData = [];

    public $search, $currentPage = 1, $perPage = 100, $sortOrder = 'desc';

    public function showView($occurrenceId): void
    {
        $occurrence = Occurrence::find($occurrenceId);
        $this->occurrenceData = $occurrence->toArray();

        $this->dispatch('showModal', alias: 'certificates.occurrences.form', maxWidth: 'xxl', params: [
            'data' => $this->occurrenceData
        ]);

        $this->selectedOccurrenceId = $occurrenceId;
        $this->dispatch('openModal', $occurrenceId);
    }

    public function deleteOccurrence($occurrenceId)
    {
        $occurrence = Occurrence::with('address')->find($occurrenceId);
        if ($occurrence) {
            if ($occurrence->address) {
                $occurrence->address->delete();
            }

            $occurrence->delete();

            $this->dispatch('refreshTable');
            session()->flash('message', 'Ocorrência e endereço excluídos com sucesso.');
        } else {
            session()->flash('error', 'Ocorrência não encontrada.');
        }
    }


    public function handleOccurrenceSelection($userId): void
    {

        $this->dispatch('livewire.certificates.occurrences.view.table', 'loadUser', $userId);
    }


    public function render(): View
    {
        $query = Occurrence::query()
            ->with(['nature', 'battalion']);

        if ($this->search) {
            $query->where(function($query) {
                $query->where('occurrence', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('id', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('nature', function($query) {
                        $query->where('code', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('description', 'LIKE', '%' . $this->search . '%');
                    })
                    ->orWhereHas('battalion', function($query) {
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                    });
            });
        }



        $query->orderBy('occurrence', $this->sortOrder);

        $occurrences = $query->paginate($this->perPage);

        return view('livewire.certificates.occurrences.delete.table', ['occurrences' => $occurrences]);
    }

}
