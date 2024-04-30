<?php

namespace App\Livewire\Config;

use Livewire\Component;
use App\View\Components\GuestLayout;
use Illuminate\View\View;

class Role extends Component
{
    public function render(): View
    {
        return view('livewire.config.role')
            ->layout(GuestLayout::class);
    }
}
