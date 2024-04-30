<?php

namespace App\Livewire\Manager\Tree\Question;

use App\Enums\QuestionTypeEnum;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Tree;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Table extends Component
{
    public Tree $tree;

    #[Validate(['questions.*.name' => 'required'], message: ['required' => 'Por favor, preencha o nome da pergunta.'])]
    #[Validate(['questions.*.name' => 'max:255'], message: ['max' => 'Aviso: Este campo aceita no máximo 255 caracteres.'])]
    #[Validate(['questions.*.type' => 'required'], message: ['required' => 'Por favor, selecione um tipo de resposta.'])]
    public $questions;

    public function boot(): void
    {
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                $this->validateAnswers($validator);
            });
        });
    }

    public function save(): void
    {
//        $this->validate();

//        dd('teste');

        $this->redirectRoute('manager.tree.testing', $this->tree->id);
    }

    private function validateAnswers($validator): void
    {
        $questions = $this->tree->questions()->get();

        foreach ($questions as $question) {
            foreach ($question->answers as $answer) {
                $this->validateAnswer($answer, $validator);
            }
        }
    }

    private function validateAnswer($answer, $validator): void
    {
        $this->validateAnswerGravityManager($answer, $validator);
        $this->validateAnswerAlertManager($answer, $validator);
        $this->validateAnswerResponseManager($answer, $validator);
    }

    private function validateAnswerGravityManager($answer, $validator): void
    {
        if (!$answer->occurrence_alert_gravity_id) {
            $validator->errors()->add('tste', 'tefd');
        }
    }

    private function validateAnswerAlertManager($answer, $validator): void
    {
        if (!$answer->occurrence_alert_id) {
            $validator->errors()->add('tste', 'tefd');
        }
    }

    private function validateAnswerResponseManager($answer, $validator): void
    {
        if (!$answer->answer) $validator->errors()->add('tste', 'tefd');
    }

    public function showAnswer(Question $question, $index): void
    {
        $this->dispatch('showModal', alias: 'manager.tree.answer.form', maxWidth: 'xxl', params: [
            'question' => $question,
            'index' => $index
        ]);
    }

    public function removeQuestion(Question $question): void
    {
        $question->delete();

        $this->loadQuestions();
    }

    private function createQuestionMultiple(Question $question, string $type): void
    {
        if ($type === QuestionTypeEnum::MULTIPLE->value) {
            QuestionAnswer::query()->create([
                'question_id' => $question->id,
            ]);
        }
    }

    private function createQuestionAnswer(Question $question, string $type): void
    {
        $questionTypeMap = [QuestionTypeEnum::TEXTAREA->value, QuestionTypeEnum::ORIENTATION->value];

        if (in_array($type, $questionTypeMap)) QuestionAnswer::query()->create([
            'question_id' => $question->id, 'name' => $type
        ]);
    }

    private function createQuestionAnswerYesOrNo(Question $question, string $type): void
    {
        if ($type === QuestionTypeEnum::YES_OR_NO->value) {
            QuestionAnswer::query()->create(['question_id' => $question->id, 'name' => 'Yes']);
            QuestionAnswer::query()->create(['question_id' => $question->id, 'name' => 'No']);
        }
    }

    #[On('refreshTable')]
    public function loadQuestions(): void
    {
        $this->questions = $this->tree->questions()
            ->orderBy('id')
            ->get()->toArray();
    }

    public function updated($property): void
    {
        $propertySegments = explode('.', $property);

        if ($this->isQuestionUpdate($propertySegments)) {
            $questionData = $this->questions[$propertySegments[1]];

            $question = Question::query()->findOrFail($questionData['id']);

            $this->updateQuestion($question, $propertySegments, $questionData);
        }
    }

    private function updateQuestion(?Question $question, $property, $data): void
    {
        $updateData = [
            'name' => $property[2] === 'name' ? $data['name'] : null,
            'type' => $property[2] === 'type' ? $data['type'] : null,
        ];

        if (empty($data['name'])) $question?->delete();

        if (empty($data['type']) || $data['type'] !== $question['type']) {
            $question?->answers()->delete();
        }

        $updateData = array_filter($updateData, fn($value) => $value !== null);

        if ($question && $updateData) {
            if (array_key_exists('type', $updateData)) {
                if (QuestionTypeEnum::enumValueExists($updateData['type'])) {
                    $this->createQuestionAnswer($question, $data['type']);
                    $this->createQuestionMultiple($question, $data['type']);
                    $this->createQuestionAnswerYesOrNo($question, $data['type']);
                }
            }

            $question->update($updateData);

            $this->loadQuestions();
        }
    }

    private function isQuestionUpdate($propertySegments): bool
    {
        return $propertySegments[0] === 'questions';
    }

    public function mount($tree): void
    {
        $this->tree = $tree;

        $this->loadQuestions();
    }

    public function render(): View
    {
        return view('livewire.manager.tree.question.table');
    }
}
