<?php

namespace App\Livewire\Dispatcher;

use Illuminate\View\View;
use Livewire\Component;

class Cabin extends Component
{
    public function render(): View
    {
        return view('livewire.dispatcher.cabin');
    }
}
