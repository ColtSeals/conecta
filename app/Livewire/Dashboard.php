<?php

namespace App\Livewire;

use App\Events\OccurrenceEvent;
use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(): View
    {


        return view('livewire.dashboard');
    }
}
