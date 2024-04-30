<?php

namespace App\Livewire\Supervision\Cabin;

use App\Models\Battalion;
use App\Models\Occurrence;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

use App\Events\OccurrenceEvent;


class Table extends Component
{
    use WithPagination;

    public $search, $currentPage = 1, $perPage = 100, $sortOrder = 'desc';


    #[Locked]
    public Battalion $battalion;

    public $occurrences = [];

    protected $listeners = ['refreshTable' => '$refresh',
        'occurrenceSelected' => 'handleOccurrenceSelection',
        'occurrenceUpdated' => 'handleOccurrenceUpdated'];

    public $selectedOccurrenceId;

    public $occurrenceData = [];


    public function handleOccurrenceUpdated($battalionId): void
    {
        logger("handleOccurrenceUpdated chamado com battalionId: {$battalionId}");
        $this->loadOccurrences();
    }

    public function showPending($occurrenceId): void
    {
        $occurrence = Occurrence::find($occurrenceId);
        $this->occurrenceData = $occurrence->toArray();

        $this->dispatch('showModal', alias: 'dispatcher.cabin.occurrence.pending.form', maxWidth: 'xxl', params: [
            'data' => $this->occurrenceData
        ]);

        $this->selectedOccurrenceId = $occurrenceId;
        $this->dispatch('openModal', $occurrenceId);
    }

    public function showCommitted($occurrenceId): void
    {
        $occurrence = Occurrence::find($occurrenceId);
        $this->occurrenceData = $occurrence->toArray();

        $this->dispatch('showModal', alias: 'dispatcher.cabin.occurrence.committed.form', maxWidth: 'xxl', params: [
            'data' => $this->occurrenceData
        ]);

        $this->selectedOccurrenceId = $occurrenceId;
        $this->dispatch('openModal', $occurrenceId);
    }

    public function handleOccurrenceSelection($occurrenceId): void
    {

        $this->dispatch('dispatcher.cabin.occurrence.pending.form', 'loadOccurrence', $occurrenceId);
    }

    public $occurrencesWithPatrol = [];
    public $occurrencesWithoutPatrol = [];

    #[On('echo-private:occurrences.{battalion.id},OccurrenceEvent')]
    public function loadOccurrences(): void
    {
        $baseQuery = $this->battalion->occurrences()
            ->where(function ($query) {
                $query->whereNull('finish')
                    ->orWhere('finish', '=', '');
            });

        $this->occurrencesWithPatrol = (clone $baseQuery)
            ->whereNotNull('patrol')
            ->where('patrol', '<>', '')
            ->orderByRaw("CASE WHEN observe IS NULL OR observe = '' THEN 0 ELSE 1 END")
            ->get();

        $this->occurrencesWithoutPatrol = (clone $baseQuery)
            ->where(function ($query) {
                $query->whereNull('patrol')
                    ->orWhere('patrol', '=', '');
            })

            ->orderByRaw("CASE WHEN observe IS NULL OR observe = '' THEN 0 ELSE 1 END")
            ->get();
    }



    public function mount(): void
    {
        $this->battalion = Auth::user()->userBattalion->battalion;

        $this->loadOccurrences();
    }


    public function render(): View
    {
        $query = Occurrence::query();
        if ($this->search) {
            $query->where('code', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description', 'LIKE', '%' . $this->search . '%');
        }

        $query->orderBy('id', $this->sortOrder);

        $occurrences = $query->paginate($this->perPage);

        return view('livewire.supervision.cabin.table', ['occurrences' => $occurrences]);
    }


}
