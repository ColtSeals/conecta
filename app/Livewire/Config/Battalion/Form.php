<?php

namespace App\Livewire\Config\Battalion;

use App\Models\Battalion;
use App\Models\UserBattalion;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    #[Validate(['required', 'exists:'.Battalion::class.',id'])]
    public $battalion;

    public function save(): void
    {
        $this->validate();

        Auth::user()->userBattalion?->delete();

        UserBattalion::query()->create(['battalion_id' => $this->battalion]);

        $this->dispatch('battalionSelected', ['battalionId' => $this->battalion]);

        $this->redirectRoute('dashboard');
    }

    public function mount(): void
    {
        Auth::user()->userBattalion?->delete();
    }

    public function render(): View
    {
        return view('livewire.config.battalion.form');
    }
}
