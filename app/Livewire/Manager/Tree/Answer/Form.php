<?php

namespace App\Livewire\Manager\Tree\Answer;

use App\Models\OccurrenceAlert;
use App\Models\Question;
use App\Models\QuestionAnswer;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Form extends Component
{
    #[Locked]
    public Question $question;

    public $answers;
    public $index;

    public function addOption(): void
    {
        if ($this->answers) {
            $lastOption = end($this->answers);

            // Verifica se a última opção já está em branco.
            if (!empty($lastOption['name'])) {
                QuestionAnswer::query()->create(['question_id' => $lastOption['question_id'] ?? $this->question->id]);

                $this->loadAnswers();
            }
        } else {
            // Se não há respostas, adiciona a primeira opção em branco.
            $this->answers[] = ['name' => '', 'question_id' => $this->question->id];
        }
    }


    public function removeOption(): void
    {
        if (!empty($this->answers)) {
            $lastAnswer = end($this->answers);

            if (isset($lastAnswer['id'])) {
                $answerToDelete = QuestionAnswer::find($lastAnswer['id']);
                if ($answerToDelete) {
                    $answerToDelete->delete();
                }
            }

            array_pop($this->answers);

            $this->resetErrorBag();
        }
    }


    private function updateAnswerProperty(?QuestionAnswer $answer, $propertySegments): void
    {
        $propertyName = $propertySegments[2];

        $propertyMap = ['name', 'occurrence_alert_id', 'occurrence_alert_gravity_id', 'answer'];

        if ($answer && in_array($propertyName, $propertyMap)) $answer->update([
            $propertyName => $this->answers[$propertySegments[1]][$propertyName]
        ]);
    }

    private function isAnswerUpdate($propertySegments): bool
    {
        return count($propertySegments) === 3 &&
            isset($this->answers[$propertySegments[1]]) &&
            in_array($propertySegments[2], [
                'name',
                'occurrence_alert_id',
                'occurrence_alert_gravity_id',
                'answer'
            ]);
    }

    public function showAnswerRedirect(QuestionAnswer $answer): void
    {
        $this->dispatch('showModal', alias: 'manager.tree.redirect.form', maxWidth: 'xxl', params: [
            'answer' => $answer,
            'index' => $this->index
        ]);
    }

    public function loadAnswers(): void
    {
        $this->answers = $this->question->answers()
            ->get()->toArray();
    }

    public function updated($property): void
    {
        $propertySegments = explode('.', $property);

        if ($this->isAnswerUpdate($propertySegments)) {
            $answerData = $this->answers[$propertySegments[1]];
            $answer = QuestionAnswer::query()->find($answerData['id']);

            $this->updateAnswerProperty($answer, $propertySegments);
        }
    }

    public function mount($data): void
    {
        $this->question = Question::query()->find($data['question']['id']);
        $this->index = $data['index'];
        $this->loadAnswers();

        // Adiciona uma opção em branco apenas se não houver respostas carregadas.
        if (empty($this->answers)) {
            $this->addOption();
        }
    }


    public function render(): View
    {
        return view('livewire.manager.tree.answer.form');
    }
}
