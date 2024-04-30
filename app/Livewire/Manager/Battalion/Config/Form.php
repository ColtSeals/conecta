<?php

namespace App\Livewire\Manager\Battalion\Config;

use App\Models\Battalion;
use App\Models\BattalionPolygon;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public Battalion $battalion;

    #[Validate(['options.*.file' => 'required'], message: ['required' => 'É necessário inserir o arquivo do polígono.'])]
    public $options = [];

    public function save(): void
    {
        $this->validate();

        foreach ($this->options as $option) {
            $file = $option['file'];

            $coordinates = $this->getCoordinatesFromFile($file);

            $this->battalion->polygons()->create([
                'company' => $option['name'],
                'coordinates' => $coordinates
            ]);
        }

        $this->reset('options');
        $this->addOption();
    }

    private function getCoordinatesFromFile($file)
    {
        if ($file instanceof UploadedFile && $file->isValid()) {
            $filePath = $file->path();

            $kml = simplexml_load_file($filePath);

            $coordinatesString = $kml->Document->Folder->Placemark
                ->Polygon->outerBoundaryIs->LinearRing->coordinates;

            return $this->formatCoordinatesToJson($coordinatesString);
        }
    }

    private function formatCoordinatesToJson(string $coordinatesString): string
    {
        $coordinatesArray = [];

        $lines = explode("\n", $coordinatesString);

        foreach ($lines as $line) {
            $line = trim($line);

            if (!empty($line)) {
                $coordinates = explode(',', $line);

                $longitude = (float)trim($coordinates[0]);
                $latitude = (float)trim($coordinates[1]);

                $coordinatesArray[] = ['longitude' => $longitude, 'latitude' => $latitude];
            }
        }

        return json_encode($coordinatesArray);
    }

    public function addOption(): void
    {
        $count = count($this->options) + 1;

        $this->options[] = ['name' => $count.'ª Cia', 'file' => ''];
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

    public function mount(Battalion $battalion): void
    {
        $this->battalion = $battalion;

        $this->addOption();
    }

    public function render(): View
    {
        return view('livewire.manager.battalion.config.form');
    }
}
