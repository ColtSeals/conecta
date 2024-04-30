<?php

namespace App\Livewire\Manager\Tree\Response;

use App\Models\QuestionAnswer;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    public ?QuestionAnswer $answer;

    #[Validate('required', message: '')]
    #[Validate('string', message: '')]
    public $text;

    public function save(): void
    {
        $this->validate();

        try {
            $this->answer->update(['answer' => $this->text]);

            $this->reset('text');

            $this->dispatch('close-modal', modal: 'modal-answer-response');
        } catch (\Exception $exception) {
            $this->dispatch('showAlertError', message: 'Ocorreu um erro ao cadastrar as perguntas. Por favor, tente novamente.');
        }
    }

    #[On('showResponseAnswer')]
    public function showResponse(QuestionAnswer $answer): void
    {
        $this->answer = $answer;

        $this->text = $this->answer->answer;

        $this->dispatch('show-modal', modal: 'modal-answer-response');
    }

    public function render(): View
    {
        return view('livewire.manager.tree.response.form');
    }
}
