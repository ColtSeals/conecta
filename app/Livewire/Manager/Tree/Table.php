<?php

namespace App\Livewire\Manager\Tree;

use App\Models\Nature;
use App\Models\Tree;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $nature;
    public $search, $currentPage = 1, $perPage = 100, $sortOrder = 'desc';

    protected $listeners = ['refreshTable' => '$refresh'];

    public function deleteTree($treeId)
    {
        $tree = Tree::find($treeId);

        if ($tree) {
            $tree->delete();


            $this->dispatch('refreshComponent');
        }
    }

    public function mount(): void
    {
        $this->nature = Nature::query()
            ->orderBy('code', 'asc')
            ->first()->id;
    }

    public function render(): View
    {
        $query = Nature::query()->find($this->nature);

        if ($query) {
            $trees = $query->trees()->orderBy('id', $this->sortOrder)->paginate($this->perPage >= 5 && $this->perPage <= 100 ? $this->perPage : 10);
        } else {
            $trees = collect();
        }

        return view('livewire.manager.tree.table', ['trees' => $trees]);
    }

    public function toggleTreeStatus($treeId): void
    {
        $tree = \App\Models\Tree::findOrFail($treeId);

        if ($tree->active) {
        } else {
            \App\Models\Tree::where('nature_id', $tree->nature_id)
                ->where('id', '<>', $tree->id)
                ->update(['active' => false]);
        }

        $tree->active = !$tree->active;
        $tree->save();
        $this->dispatch('refreshTable')->to(\App\Livewire\Manager\Tree\Table::class);
    }




    public function redirectManagerTreeShow($treeId)
    {
        return redirect()->route('manager.tree.show', $treeId);
    }
}
