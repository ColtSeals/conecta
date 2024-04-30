<?php

namespace App\Livewire\Supervision\Occurrences\Battalions;

use App\Models\Battalion;
use App\Models\UserBattalion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\View\View;

class Table extends Component
{
    use WithPagination;

    protected $listeners = ['refreshTable' => '$refresh', 'userSelected' => 'handleUserSelection'];

    public $selectedUserId;
    public $userData = [];
    public $search, $currentPage = 1, $perPage = 100, $sortOrder = 'asc';

    public function selectBattalion($battalionId)
    {
        Auth::user()->userBattalion?->delete();

        UserBattalion::query()->create([
            'user_id' => Auth::id(),
            'battalion_id' => $battalionId,
        ]);

        return redirect()->route('supervision.cabin');
    }

    public function render(): View
    {
        $query = Battalion::query();

        if ($this->search) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
        }

        $query->orderBy('name', $this->sortOrder);

        $battalions = $query->paginate($this->perPage);

        return view('livewire.supervision.occurrences.battalions.table', ['battalions' => $battalions]);
    }
}
