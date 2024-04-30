<?php

namespace App\Livewire\Manager\Tree\Redirect;

use App\Models\Nature;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Tree;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    #[Locked]
    public QuestionAnswer $answer;

    #[Locked]
    public $index;

    public $questions;
    public $selectedQuestionsIds = [];

    #[Validate('required', message: 'kojkolfdsjksdf')]

    public $question;

    public function save(): void
    {
        $this->validate();

        try {
            $this->answer->update(['question_answer_id' => $this->question]);
            $this->dispatch('showAlertSuccess', title: 'Sucesso', message: 'A questão foi redirecionada com sucesso 😁');


            $this->dispatch('closeModal', ['modal' => 'livewire.manager.tree.redirecionar.form']);

            $this->reset('question');
        } catch (\Exception $exception) {
            $this->dispatch('showAlertError', message: 'Ocorreu um erro ao cadastrar as perguntas. Por favor, tente novamente.');
        }
    }

    public function loadQuestions(): void
    {
        $treeId = $this->answer->question->tree_id;
        $questionId = $this->answer->question->id;

        $this->questions = Tree::find($treeId)
            ->questions()
            ->whereNotIn('id', [$questionId])
            ->get();

        $questionIdsForTree = Question::where('tree_id', $treeId)->pluck('id')->toArray();
        $this->selectedQuestionsIds = QuestionAnswer::whereIn('question_id', $questionIdsForTree)
            ->pluck('question_answer_id')
            ->toArray();
    }

    public function mount($data): void
    {
        $this->answer = QuestionAnswer::query()->find($data['answer']['id']);
        $this->index = $data['index'];
        $this->question = $this->answer->question_answer_id;
        $this->loadQuestions();
    }

    public function render(): View
    {
        return view('livewire.manager.tree.redirect.form');
    }
}
