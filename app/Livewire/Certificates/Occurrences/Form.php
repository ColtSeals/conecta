<?php

namespace App\Livewire\Certificates\Occurrences;

use App\Models\Occurrence;
use Livewire\Component;

class Form extends Component
{

    public $data = [];

    public $battalion_id;
    public $occurrenceId, $identification, $patent, $phone, $reiteration, $answers, $possible_hazing, $patrol, $hidden, $created_at, $updated_at;
    public $street, $number, $city, $state, $cep, $plusCode, $neighborhood, $reference;
    public $code, $description, $observe, $redirect, $atendent;
    public $specialty_id, $name, $company, $requestor;
    public $patentName;


    public function mount($occurrenceId): void
    {
        $this->loadOccurrenceData($occurrenceId);
    }

    public function loadOccurrenceData($occurrenceId): void
    {
        $occurrence = Occurrence::with(['address', 'nature', 'battalion'])->findOrFail($occurrenceId['data']['id']);

        $address = $occurrence->address;
        $nature = $occurrence->nature;
        $battalion = $occurrence->battalion;

        $battalionPolygon = $battalion ? $battalion->battalionPolygon : null;

        $this->data = [
            'id' => $occurrence->id,
            'occurrence' => $occurrence->occurrence,
            'requestor' => $occurrence->requestor,
            'phone' => $occurrence->phone,
            'reiteration' => $occurrence->reiteration,
            'answers' => $occurrence->answers,
            'possible_hazing' => $occurrence->possible_hazing,
            'patrol' => $occurrence->patrol,
            'company' => $occurrence->company,
            'atendent' => $occurrence->atendent,
            'observe' => $occurrence->observe,
            'finish' => $occurrence->finish,
            'redirect' => $occurrence->redirect,
            'previous_battalion_id' => $occurrence->previous_battalion_id,

            'hidden' => $occurrence->hidden,
            'created_at' => $occurrence->created_at,
            'updated_at' => $occurrence->updated_at,

            'state' => $address ? $address->state : null,
            'street' => $address ? $address->street : null,
            'city' => $address ? $address->city : null,
            'number' => $address ? $address->number : null,
            'neighborhood' => $address ? $address->neighborhood : null,
            'pluscode' => $address ? $address->pluscode : null,
            'cep' => $address ? $address->cep : null,

            'code' => $nature ? $nature->code : null,
            'description' => $nature ? $nature->description : null,

            'specialty_id' => $battalion ? $battalion->specialty_id : null,
            'name' => $battalion ? $battalion->name : null,

        ];
    }

    public function committedPatrol(): void
    {
        $occurrence = Occurrence::findOrFail($this->data['id']);
        $occurrence->update([
            'patrol' => $this->data['patrol'],
        ]);


        $this->dispatch('hideModal');

        $this->dispatch('refreshTable')->to(Table::class);

    }

    public function observation(): void
    {
        $occurrence = Occurrence::findOrFail($this->data['id']);
        $occurrence->update([
            'observe' => $this->data['observe'],
        ]);


        $this->dispatch('hideModal');

        $this->dispatch('refreshTable')->to(Table::class);

    }

    public function finished(): void
    {
        $occurrence = Occurrence::findOrFail($this->data['id']);
        $occurrence->update([
            'finish' => $this->data['finish'],
        ]);

        $this->dispatch('hideModal');

        $this->dispatch('refreshTable')->to(Table::class);

    }

    public function save(): void
    {
        $occurrence = Occurrence::findOrFail($this->data['id']);

        $occurrence->update([
            'occurrence' => $this->data['occurrence'],
            'requestor' => $this->data['requestor'],
            'phone' => $this->data['phone'],
            'reiteration' => $this->data['reiteration'],
            'answers' => $this->data['answers'],
            'possible_hazing' => $this->data['possible_hazing'],
            'patrol' => $this->data['patrol'],
            'observe' => $this->data['observe'],
            'finish' => $this->data['finish'],
            'company' => $this->data['company'],
            'hidden' => $this->data['hidden'],
        ]);

        if (isset($this->data['address'])) {
            $occurrence->address->update($this->data['address']);
        }

        $this->dispatch('hideModal');

        $this->dispatch('refreshTable')->to(Table::class);
    }

    public $selectedOccurrenceId;

    public $occurrenceData = [];


    public function render()
    {

        return view('livewire.certificates.occurrences.form');
    }

}
