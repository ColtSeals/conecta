<?php

namespace App\Livewire\Manager\Tree\Question;

use App\Models\Question;
use App\Models\Tree;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    #[Locked]
    public Tree $tree;

    #[Validate(['options.*.question' => 'required'])]
    public $options = [];

    public function messages(): array
    {
        return [
            'options.*.question.required' => 'É necessário preencher este campo para prosseguir.',
        ];
    }

    public function save(): void
    {
        $this->validate();

        try {
            $this->createQuestions();

            $this->dispatch('close-modal', modal: 'modal-question-create');
            $this->dispatch('refreshTable')->to(Table::class);

            $this->resetOption();
        } catch (\Exception $exception) {
            DB::rollBack();

            $this->dispatch('showAlertError', message: 'Ocorreu um erro ao cadastrar as perguntas. Por favor, tente novamente.');
        }

        $this->resetErrorBag();
    }

    private function createQuestions(): void
    {
        DB::beginTransaction();

        foreach ($this->options as $option) {
            Question::query()->create([
                'tree_id' => $this->tree->id,
                'name' => $option['question'],
            ]);
        }

        DB::commit();
    }

    public function addOption(): void
    {
        $lastOption = end($this->options);

        if (!$lastOption || !empty($lastOption['question'])) {
            $this->options[] = ['question' => ''];
        }
    }

    public function removeOption($index): void
    {
        $nextIndex = $index + 1;

        if (isset($this->options[$nextIndex]['question'])) {
            unset($this->options[$nextIndex]);
        } else {
            unset($this->options[$index]);
        }

        $this->options = array_values($this->options);

        $this->resetErrorBag();
    }

    private function resetOption(): void
    {
        $this->reset('options');
        $this->addOption();
    }

    public function mount($tree): void
    {
        $this->tree = Tree::query()->find($tree['id']);

        $this->addOption();
    }

    public function render(): View
    {
        return view('livewire.manager.tree.question.form');
    }
}
