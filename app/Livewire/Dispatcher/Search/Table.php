<?php

namespace App\Livewire\Dispatcher\Search;
use App\Models\Battalion;
use App\Models\Occurrence;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Component;

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

        $this->dispatch('showModal', alias: 'dispatcher.search.form', maxWidth: 'xxl', params: [
            'data' => $this->occurrenceData
        ]);

        $this->selectedOccurrenceId = $occurrenceId;
        $this->dispatch('openModal', $occurrenceId);
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
                    })
                    ->orWhereHas('address', function($query) {
                        $query->where('street', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('number', 'LIKE', '%' . $this->search . '%');
                    })
                    ->orWhere('atendent', 'LIKE', '%' . $this->search . '%');
            });
        }




        $query->orderBy('occurrence', $this->sortOrder);

        $occurrences = $query->paginate($this->perPage);

        return view('livewire.dispatcher.search.table', ['occurrences' => $occurrences]);
    }

}
