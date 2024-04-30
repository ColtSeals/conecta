<?php

namespace App\Livewire\Dispatcher\Cabin\Occurrence\Create;
use App\Livewire\Dispatcher\Cabin\Table;
use App\Models\Address;
use App\Models\Occurrence;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Livewire\Component;

class Form extends Component
{
    public $steps = 1;

    public $police = false, $possibleHazing = false, $status;

    public $date, $phone, $nature, $latitude, $longitude;
    public $street, $number, $neighborhood, $city, $state, $country, $plusCode, $reference,$complement;
    public $requestor, $company, $battalionId, $questionAnswer, $patrol;


    public function save(): void
    {
        $validatedData = $this->validate([
            'phone' => 'required|string',
            'nature' => 'required|exists:natures,id',
            'street' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'battalionId' => 'required|exists:battalions,id',
            'company' => 'required|string|max:255',
            'number' => 'required|numeric',
            'questionAnswer' => 'required|string|max:7000'
        ]);



        $occurrence = $this->createOrUpdateOccurrence();

       $this->reset();

        $this->dispatch('refreshTable')->to(Table::class);


    }

    public function closeModal(): void
    {
        $this->dispatch('closeModal');
    }


    private function createOrUpdateOccurrence(): Occurrence
    {
        $addressId = $this->firstOrCreateAddress();

        return Occurrence::create([
            'steps' => $this->steps,
            'police' => $this->police  ?? null,
            'possible_hazing' => $this->possibleHazing,
            'address_id' => $addressId,
            'requestor' => $this->requestor  ?? null,
            'patrol' => $this->patrol  ?? null,
            'phone' => $this->phone  ?? null,
            'nature_id' => $this->nature,
            'battalion_id' => $this->battalionId,
            'company' => $this->company ?? null,
            'atendent' => $this->atendent,
            'answers' => $this->questionAnswer,
            'information' => $this->information ?? null,
            'hidden' => 1,
        ]);
    }

    private function firstOrCreateAddress(): ?string
    {
        $address = Address::query()->firstOrCreate([
            'street' => $this->street,
            'number' => $this->number,
            'city' => $this->city,
            'state' => $this->state ?? null,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'complement' => $this->complement,
            'neighborhood' => $this->neighborhood,
            'reference' => $this->reference
        ]);


        return $address->id;
    }

    public $atendent;

    public function render(): View
    {

        $user = Auth::user();
        \Log::debug('Usuário autenticado:', $user ? $user->toArray() : ['user' => null]);

        if ($user) {
            $this->atendent = $user->license . ' - ' . $user->name;
        }

        return view('livewire.dispatcher.cabin.occurrence.create.form');
    }
}
