<?php

namespace App\Livewire\Occurrence;

use App\Models\Address;
use App\Models\Occurrence;
use App\Models\QuestionAnswer;
use App\Models\Nature;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Question;


use App\Events\OccurrenceEvent;



class Form extends Component
{
    public $steps = 1;
    public $isOpen = false;

    public $police = false, $possibleHazing = false, $status;

    public $date, $phone, $nature, $latitude, $longitude, $references;
    public $street, $number, $neighborhood, $city, $state, $country, $postal_code, $plusCode, $reference, $cep, $complement;
    public $battalionId, $answers, $information, $patrol, $hidden;
    public $requestor, $battalion, $company;

    public $question, $answer, $nextAnswer, $finish;
    public $answerText, $questionAnswer, $countQuestion, $questionAnswers = [];
    public $additionalComment;


    private function validateOneStep(): array
    {
        return [
            'rules' => [
               'phone' => 'required|string',
                'city' => 'required|string',
                'street' => 'required|string',
               'number' => 'required|integer',
               'neighborhood' => 'required|string',
                'nature' => 'required|string',


            ],
            'messages' => [


            ]
        ];
    }

    private function validateTwoStep(): array
    {
        return [
            'rules' => [
                'battalionId' => 'required',
                'company' => 'required|string',
                'phone' => 'required|string',
                'city' => 'required|string',
                'street' => 'required|string',
                'number' => 'required|integer',
                'neighborhood' => 'required|string',
            ],
            'messages' => [

            ]
        ];
    }


    private function rulesSteps(): array
    {
        return [
            1 => [
               'phone' => 'required',
                'nature' => 'required|string|exists:natures,id',
                'street' => 'required|string',
                'number' => 'required|string',
                'neighborhood' => 'required|string',
               'city' => 'required|string',
               'country' => 'required|string',
            ],
        ];
    }





    public function save()
    {
        if ($this->steps == 2) {
            $validation = $this->validateTwoStep();
            $this->validate($validation['rules'], $validation['messages']);
        }

        $occurrence = $this->createOrUpdateUser();
        \Log::info('Antes de emitir o evento de ocorrência');

        $this->dispatch('occurrenceUpdated');

        \Log::info('Depois de emitir o evento de ocorrência');


        $this->dispatch('dispatcher.cabin.table', 'occurrenceUpdated', $this->battalionId);

        // Redireciona para a rota de criar nova ocorrência
        return redirect()->route('occurrence.create');
    }






    private function emitOccurrenceEvent(Occurrence $occurrence): void
    {

        $this->dispatch('echo-private:occurrences.' . $this->battalionId, new OccurrenceEvent($occurrence));
    }


    private function createOrUpdateUser(): Occurrence
    {
        $addressId = $this->firstOrCreateAddress();
        return Occurrence::create([
            'steps' => $this->steps,
            'police' => $this->police,
            'possible_hazing' => $this->possibleHazing,
            'address_id' => $addressId,
            'requestor' => $this->requestor,
            'phone' => $this->phone,
            'nature_id' => $this->nature,
            'battalion_id' => $this->battalionId,
            'company' => $this->company ?? null,
            'atendent' => $this->atendent,
            'answers' => $this->questionAnswer,
            'information' => $this->information,
            'patrol' => $this->patrol,
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
            'cep' => $this->cep,
            'pluscode' => $this->plusCode,
            'complement' => $this->complement,
            'neighborhood' => $this->neighborhood,
            'reference' => $this->reference
        ]);


        return $address->id;
    }

    private function validateTreeStep(): array
    {
        return [];
    }


    private function handleNextStep(): void
    {
        if ($this->steps == 1) {
            $validation = $this->validateOneStep();
        } elseif ($this->steps == 2) {
            $validation = $this->validateTwoStep();
        }

        $this->validate($validation['rules'], $validation['messages']);

        $this->steps++;
    }



    public function nextStep(): void
    {
        if ($this->steps >= 1 && $this->steps < 2) {
            $this->handleNextStep();
        }
    }


    public function toggleAccordion(): void
    {
        $this->isOpen = !$this->isOpen;
    }

    public function showGoogleReferences(): void
    {
        if ($this->latitude && $this->longitude) {
            $this->dispatch('showModal', alias: 'components.google.reference', maxWidth: 'xxl', params: [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude
            ]);
        }
    }

    public function showGoogleMap(): void
    {
        if ($this->latitude && $this->longitude) {
            $this->dispatch('showModal', alias: 'components.google.map', maxWidth: 'xxl', params: [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude
            ]);
        }
    }



    #[On('updatedValuesAddress')]
    public function updatedValuesAddress($data): void
    {
        $collection = collect($data);

        $this->plusCode = $collection->get('plus_code', '');

        $addressComponents = $collection->get('address_components', []);

        $this->street = $addressComponents['street'] ?? '';
        $this->neighborhood = $addressComponents['neighborhood'] ?? '';
        $this->city = $addressComponents['city'] ?? '';
        $this->state = $addressComponents['state'] ?? '';
        $this->country = $addressComponents['country'] ?? '';
        $this->number = $addressComponents['number'] ?? '';
        $this->postal_code = $addressComponents['postal_code'] ?? '';
    }

    #[On('updateCoordinates')]
    public function updatedLatitudeAndLongitude($latitude, $longitude): void
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        $this->findAndUpdateBattalionAndCompany();
    }


    public function nextQuestion(QuestionAnswer $answer): void
    {
        if (!empty($answer->answerTo)) {

            if ($answer->name === 'TextArea') {
                $this->validate(['answerText' => 'required']);
            }

            $currentQuestionName = $this->question->name;

            if ($answer->name === 'Yes') {
                $answerText = 'SIM';
            } elseif ($answer->name === 'No') {
                $answerText = 'NÃO';
            } else {
                $answerText = $answer->name === 'TextArea' ? $this->answerText : $answer->name;
            }

            $this->question = $answer->answerTo;

            $this->nextAnswer = $this->question->answers()->first();

            $this->questionAnswers[] = "{$this->countQuestion}- {$currentQuestionName} - {$answerText}";

            $this->finish = is_null($this->nextAnswer) || $this->nextAnswer->question_answer_id === null;

            $this->countQuestion++;

            $this->formatQuestionAnswer();

            $this->reset('answerText');
        }
    }


    private function formatQuestionAnswer(): void
    {
        $formattedAnswers = [];

        foreach ($this->questionAnswers as $questionAnswer) {
            list($number, $question, $answer) = explode('-', $questionAnswer, 3);
            $formattedAnswers[] = "{$question} - {$answer}";
        }

        $this->questionAnswer = implode('; ', $formattedAnswers);
    }







    private function loadQuestion(Nature $nature): void
    {
        $this->question = $nature->tree()->question();

        $this->finish = false;
        $this->countQuestion = 1;
    }


    private function handleNatureUpdate($value): void
    {
        $nature = Nature::query()->find($value);

        if ($nature) $this->loadQuestion($nature);
    }

    private function handlePhoneUpdate($value): void
    {
        $cleanedPhone = Str::replace(['(', ')', ' ', '-'], '', $value);

        $this->police = true;//$this->isPolicePhone($cleanedPhone);
//        $this->possibleHazing = $this->isPossibleHazingPhone($cleanedPhone);
    }

    public function updating($property, $value): void
    {
        match ($property) {
            'nature' => $this->handleNatureUpdate($value),
            'phone' => $this->handlePhoneUpdate($value),
            default => ''
        };
    }

    public function mount(): void
    {
        $this->status = true;
    }

    public $atendent;

    public function render()
    {
        $user = Auth::user();

        if ($user) {
            $this->atendent = $user->license . ' - ' . $user->name;
        }

        $natures = Nature::query()
            ->where('active', true)
            ->get();

        return view('livewire.occurrence.form', [
            'natures' => $natures,
            'atendent' => $this->atendent,
        ]);
    }
}
