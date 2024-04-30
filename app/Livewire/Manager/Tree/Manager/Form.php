<?php

namespace App\Livewire\Manager\Tree\Manager;

use App\Models\QuestionAnswer;
use Illuminate\View\View;
use Livewire\Component;

class Form extends Component
{
    public $answer;

    public function mount(QuestionAnswer $answer): void
    {
        $this->answer = $answer;
    }

    public function render(): View
    {
        return view('livewire.manager.tree.manager.form');
    }
}
