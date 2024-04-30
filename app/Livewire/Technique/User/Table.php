<?php

namespace App\Livewire\Technique\User;

use App\Models\Occurrence;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Table extends Component
{
    use WithPagination;

    protected $listeners = ['refreshTable' => '$refresh',
        'userSelected' => 'handleUserSelection'];

    public $selectedUserId;

    public $userData = [];

    public $search, $currentPage = 1, $perPage = 100, $sortOrder = 'desc';


    public function showEditUser($userId): void
    {
        $user = User::find($userId);
        $this->userData = $user->toArray();

        $this->dispatch('showModal', alias: 'technique.user.edit.form', maxWidth: 'xxl', params: [
            'data' => $this->userData
        ]);

        $this->selectedUserId = $userId;
        $this->dispatch('openModal', $userId);
    }

    public function handleOccurrenceSelection($userId): void
    {

        $this->dispatch('technique.user.edit.form', 'loadUser', $userId);
    }


    public function toggleUserStatus($userId): void
    {
        $user = \App\Models\User::findOrFail($userId);

        $user->active = !$user->active;
        $user->save();
        $this->dispatch('refreshTable')->to(\App\Livewire\Technique\User\Table::class);

    }



    public function render(): View
    {
        $query = User::query();
        if ($this->search) {
            $query->where('code', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description', 'LIKE', '%' . $this->search . '%');
        }

        $query->orderBy('id', $this->sortOrder);

        $users = $query->paginate($this->perPage);

        return view('livewire.technique.user.table', ['users' => $users]);
    }

}

