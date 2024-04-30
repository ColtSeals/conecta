<?php

namespace App\Livewire\Manager\Nature;

use App\Models\Nature;
use App\Models\NatureTag;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    #[Validate('required|string|unique:natures')]
    public $code;

    #[Validate('required')]
    public $tags;

    #[Validate('required|string')]
    public $description;

    public function boot(): void
    {
        $this->dispatch('natureTagifyInit');
    }

    public function save(): void
    {
        $this->validate();

        $nature = Nature::query()->create([
            'code' => strtoupper($this->code),
            'description' => $this->description
        ]);

        $tagsArray = $this->processTags($this->tags);
        $this->createTags($nature, $tagsArray);

        $this->dispatchSuccess();
    }

    private function processTags(string $tags): array
    {
        $tags = explode(' ', $tags);
        $tags = array_filter($tags);
        $tags = array_unique($tags);

        return $tags;
    }

    private function createTags(Nature $nature, array $tagsArray): void
    {
        DB::beginTransaction();

        try {
            foreach ($tagsArray as $tag) {
                NatureTag::query()->create([
                    'nature_id' => $nature->id,
                    'tag' => trim($tag)
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    private function dispatchSuccess(): void
    {
        $this->dispatch('close-modal', modal: 'modal-create');
        $this->dispatch('refreshTable')->to(Table::class);

    }

    #[On('updateNatureTags')]
    public function updateNatureTags($tags): void
    {
        $this->tags = $tags;
    }

    private function resetState(): void
    {
        $this->reset();
        $this->resetErrorBag();
    }

    public function render(): View
    {
        return view('livewire.manager.nature.form');
    }
}
