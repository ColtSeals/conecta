<?php

namespace App\Livewire\Config;

use App\View\Components\GuestLayout;
use Illuminate\View\View;
use Livewire\Component;

class Battalion extends Component
{
    public function render(): View
    {
        return view('livewire.config.battalion')
            ->layout(GuestLayout::class);
    }
}
