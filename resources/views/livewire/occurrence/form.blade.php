<div>
    @if($this->status === false)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <h4 class="alert-heading d-flex align-items-center"><i class="mdi mdi-alert-circle-outline mdi-24px me-2"></i>Error!!</h4>
        </div>
    @endif



    <div class="content">
        <div class="row gy-4">
            @if($this->steps === 1)
                <div class="col-12">
                    <div class="row">

                        <div class="col-sm-12 col-lg-12">
                            <div class="card">
                                <div class="card-body px-3">
                                    <div class="row gy-4">
                                        <div class="col-sm-12 col-lg-3">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                </span>

                                                <div class="form-floating form-floating-outline">
                                                    <x-input wire:model="phone" type="text" maxlength="15"
                                                             placeholder="{{ __('Insira o número de telefone') }}" />
                                                    <x-label >{{ __('Telefone') }}</x-label>
                                                </div>
                                            </div>

                                            <x-input-error for="phone"/>
                                        </div>
                                        <div class="col-sm-12 col-lg-3">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                </span>

                                                <div class="form-floating form-floating-outline">
                                                    <x-input wire:model="requestor" type="text"
                                                             placeholder="{{ __('Insira o nome do solicitante') }}"/>
                                                    <x-label>{{ __('Solicitante') }}</x-label>
                                                </div>
                                            </div>

                                            <x-input-error for="requestor"/>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div wire:ignore>
                                                <div class="form-floating form-floating-outline">
                                                    <select id="select2nature"
                                                            class="form-select @error('nature') is-invalid @enderror"
                                                            aria-label="nature">
                                                        <option value="" selected
                                                                disabled>{{ __('Selecione uma Natureza') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <x-input-error for="nature"/>
                                        </div>


                                        @if($status === true)
                                            <div class="col-sm-12 col-lg-2">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                                                    <div class="form-floating form-floating-outline">
                                                        <x-input wire:model="state" type="text"
                                                                 placeholder="{{ __('Insira o Estado') }}" />
                                                        <x-label >{{ __('Estado') }}</x-label>
                                                    </div>
                                                </div>

                                                <x-input-error for="state"/>
                                            </div>
                                            <div class="col-sm-12 col-lg-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                                                    <div class="form-floating form-floating-outline">
                                                        <x-input wire:model="city" type="text"
                                                                 placeholder="{{ __('Insira o Município') }}" />
                                                        <x-label >{{ __('Município') }}</x-label>
                                                    </div>
                                                </div>

                                                <x-input-error for="city"/>
                                            </div>
                                            <div class="col-sm-12 col-lg-5">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                                                    <div class="form-floating form-floating-outline">
                                                        <x-input wire:model="street" type="text"
                                                                 placeholder="{{ __('Insira o Endereço') }}" />
                                                        <x-label >{{ __('Endereço') }}</x-label>
                                                    </div>
                                                </div>

                                                <x-input-error for="street"/>
                                            </div>
                                            <div class="col-sm-12 col-lg-2">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                                                    <div class="form-floating form-floating-outline">
                                                        <x-input wire:model="number" type="number" min="0" max="999999999"
                                                                 placeholder="{{ __('Insira o Número') }}" />
                                                        <x-label >{{ __('Número') }}</x-label>
                                                    </div>
                                                </div>

                                                <x-input-error for="number"/>
                                            </div>

                                            <div class="col-sm-12 col-lg-4">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                                                    <div class="form-floating form-floating-outline">
                                                        <x-input wire:model="neighborhood" type="text"
                                                                 placeholder="{{ __('Insira o Bairro') }}" />
                                                        <x-label >{{ __('Bairro') }}</x-label>
                                                    </div>
                                                </div>

                                                <x-input-error for="neighborhood"/>
                                            </div>
                                            <div class="col-sm-12 col-lg-5">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                                                    <div class="form-floating form-floating-outline">
                                                        <x-input wire:model="reference" type="text"
                                                                 placeholder="{{ __('Informe a Referência') }}" />
                                                        <x-label>{{ __('Referência') }}</x-label>
                                                    </div>
                                                </div>

                                                <x-input-error for="reference"/>
                                            </div>
                                            <div class="col-sm-12 col-lg-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                                                    <div class="form-floating form-floating-outline">
                                                        <x-input wire:model="atendent" type="text"
                                                                 placeholder="{{ __('atendente') }}" disabled="true" />
                                                        <x-label >{{ __('Atendente') }}</x-label>
                                                    </div>
                                                </div>

                                                <x-input-error for="atendent"/>
                                            </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($this->steps === 2)
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-sm-12 col-lg-3">
                                    <div class="input-group input-group-merge">
                                            <span class="input-group-text">
                                            </span>

                                        <div class="form-floating form-floating-outline">
                                            <x-input wire:model="requestor" type="text"
                                                     placeholder="{{ __('Insira o nome do solicitante') }}"/>
                                            <x-label>{{ __('Solicitante') }}</x-label>
                                        </div>
                                    </div>

                                    <x-input-error for="requestor"/>
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">

                                    </span>

                                        <div class="form-floating form-floating-outline">
                                            <x-input wire:model="phone" type="text" maxlength="15"
                                                     placeholder="{{ __('Insira o número de telefone') }}" />
                                            <x-label >{{ __('Telefone') }}</x-label>
                                        </div>
                                    </div>

                                    <x-input-error for="phone"/>
                                </div>

                                <div class="col-sm-12 col-lg-3">
                                    <div class="form-floating form-floating-outline">
                                        <select class="form-select" wire:model="battalionId" aria-label="battalionId">
                                            <option selected value="">{{ __('Selecione uma Categoria') }}</option>
                                            @foreach(\App\Models\Battalion::query()->get() as $battalion)
                                                <option value="{{ $battalion->id }}">{{ $battalion->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-label >{{ __('Categoria do Batalhão') }}</x-label>
                                    </div>
                                    <x-input-error for="battalionId"/>
                                </div>


                                <div class="col-sm-12 col-lg-3">
                                    <div class="form-floating form-floating-outline">
                                        <select class="form-select" wire:model="company" aria-label="company">
                                            <option selected >{{ __('Selecione uma Categoria') }}</option>
                                            <option value="1ª Cia">1ª Cia</option>
                                            <option value="2ª Cia">2ª Cia</option>
                                            <option value="3ª Cia">3ª Cia</option>
                                            <option value="4ª Cia">4ª Cia</option>
                                            <option value="5ª Cia">5ª Cia</option>
                                            <option value="6ª Cia">6ª Cia</option>
                                            <option value="7ª Cia">7ª Cia</option>
                                            <option value="8ª Cia">8ª Cia</option>
                                        </select>

                                        <x-label >{{ __('Companhia') }}</x-label>
                                    </div>
                                    <x-input-error for="company"/>
                                </div>
                                <div class="row gy-4">
                                    <div class="col-sm-12 col-lg-2">
                                        <div class="input-group input-group-merge">
                                                                <span class="input-group-text">

                                                                </span>

                                            <div class="form-floating form-floating-outline">
                                                <x-input wire:model="state"
                                                         type="text"
                                                         placeholder="{{ __('Insira o Estado') }}"
                                                         />
                                                <x-label >{{ __('Estado') }}</x-label>
                                            </div>
                                        </div>

                                        <x-input-error for="state"/>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <div class="input-group input-group-merge">
                                                                    <span class="input-group-text">

                                                                    </span>

                                            <div class="form-floating form-floating-outline">
                                                <x-input wire:model="city"
                                                         type="text"
                                                         placeholder="{{ __('Insira o Município') }}"
                                                         />
                                                <x-label
                                                    >{{ __('Município') }}</x-label>
                                            </div>
                                        </div>

                                        <x-input-error for="city"/>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="input-group input-group-merge">
                                                                    <span class="input-group-text">

                                                                    </span>

                                            <div class="form-floating form-floating-outline">
                                                <x-input wire:model="street"
                                                         type="text"
                                                         placeholder="{{ __('Insira o Endereço') }}"
                                                         />
                                                <x-label
                                                    >{{ __('Endereço') }}</x-label>
                                            </div>
                                        </div>

                                        <x-input-error for="street"/>
                                    </div>

                                    <div class="col-sm-12 col-lg-2">
                                        <div class="input-group input-group-merge">
                                                                    <span class="input-group-text">
                                                                    </span>

                                            <div class="form-floating form-floating-outline">
                                                <x-input wire:model="number" type="number"
                                                         min="0" max="999999999"
                                                         placeholder="{{ __('Insira o Número') }}"
                                                         />
                                                <x-label >{{ __('Número') }}</x-label>
                                            </div>
                                        </div>

                                        <x-input-error for="number"/>
                                    </div>


                                    <div class="col-sm-12 col-lg-3">
                                        <div class="input-group input-group-merge">
                                                                    <span class="input-group-text">
                                                                    </span>

                                            <div class="form-floating form-floating-outline">
                                                <x-input wire:model="complement" type="text"
                                                         placeholder="{{ __('Insira o complemento') }}"
                                                         />
                                                <x-label
                                                    >{{ __('Complemento') }}</x-label>
                                            </div>
                                        </div>

                                        <x-input-error for="complement"/>
                                    </div>

                                    <div class="col-sm-12 col-lg-3">
                                        <div class="input-group input-group-merge">
                                                                <span class="input-group-text">
                                                                </span>

                                            <div class="form-floating form-floating-outline">
                                                <x-input
                                                         wire:model="neighborhood" type="text"
                                                         placeholder="{{ __('Insira o Bairro') }}"
                                                         />
                                                <x-label >{{ __('Bairro') }}</x-label>
                                            </div>
                                        </div>

                                        <x-input-error for="neighborhood"/>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        <div class="input-group input-group-merge">
                                                                <span class="input-group-text">
                                                                </span>

                                            <div class="form-floating form-floating-outline">
                                                <x-input wire:model="reference" type="text"
                                                         placeholder="{{ __('Informe a Referência') }}"
                                                         />
                                                <x-label>{{ __('Referência') }}</x-label>
                                            </div>
                                        </div>

                                        <x-input-error for="reference"/>
                                    </div>
                                    <div class="col-sm-12 col-lg-2">
                                        <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                                            <div class="form-floating form-floating-outline">
                                                <x-input wire:model="atendent" type="text"
                                                         placeholder="{{ __('atendente') }}" disabled="true" />
                                                <x-label >{{ __('Atendente') }}</x-label>
                                            </div>
                                        </div>

                                        <x-input-error for="atendent"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row gy-4">
                        @if($question)
                            <div class="col-sm-12 col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ __('Pergunta') }} {{ str_pad($countQuestion, 2, '0', STR_PAD_LEFT) }}
                                        </h5>

                                        <p class="card-subtitle">{{ $question->name }}</p>

                                        <div class="row gy-4 mt-2">
                                            <hr class="m-0">

                                            <div class="col-12">
                                                <div class="row gy-4">
                                                    @if($this->question->type === 'Multiple')
                                                        <div class="col-12">
                                                            <div class="form-floating form-floating-outline">
                                                                <select class="form-select" wire:change="nextQuestion($event.target.value)">
                                                                    <option value="" selected>{{ __('Selecione uma Opção') }}</option>
                                                                    @foreach($this->question->answers as $answer)
                                                                        <option value="{{ $answer->id }}">{{ $answer->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @foreach($this->question->answers as $answer)
                                                            @if($this->question->type === 'YesOrNo')
                                                                @if($answer->name === 'Yes')
                                                                    <div class="col-12">
                                                                        <x-success-button
                                                                            wire:click="nextQuestion('{{ $answer->id }}')"
                                                                            class="btn-block w-100">
                                                                            {{ __('Sim') }}
                                                                        </x-success-button>
                                                                    </div>
                                                                @elseif($answer->name === 'No')
                                                                    <div class="col-12">
                                                                        <x-danger-button
                                                                            wire:click="nextQuestion('{{ $answer->id }}')"
                                                                            class="btn-block w-100">
                                                                            {{ __('Não') }}
                                                                        </x-danger-button>
                                                                    </div>
                                                                @endif
                                                            @elseif($this->question->type === 'TextArea')
                                                                <div class="col-12">
                                                                        <textarea wire:model.blur="answerText"
                                                                                  aria-label="answerText"
                                                                                  class="form-control"
                                                                                  style="height: 100px;"
                                                                                  placeholder="{{ $answer->answer }}"
                                                                        ></textarea>
                                                                </div>
                                                            @elseif($this->question->type === 'Orientation')
                                                                <div class="col-12">
                                                                    <h5>{{ $answer->answer }}</h5>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>




                                            @if($this->nextAnswer && in_array($this->nextAnswer->name, ['TextArea', 'Orientation']))
                                                <hr class="m-0 mt-3">

                                                <div class="col-12 d-flex justify-content-between">
                                                    <button class="btn btn-outline-secondary" disabled>
                                                        <i class="mdi mdi-arrow-left me-sm-1 me-0"></i>
                                                        <span class="align-middle d-sm-inline-block d-none">{{ __('Voltar') }}</span>
                                                    </button>

                                                    @if(!$this->finish)
                                                        <x-secondary-button wire:click="nextQuestion('{{ $question->answers->first()->id }}')">
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">{{ __('Avançar') }}</span>
                                                        </x-secondary-button>
                                                    @endif

                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-sm-12 col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ __('Dados da Ocorrência') }}
                                    </h5>

                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <div class="form-control" style="height: 193px; overflow-y: auto;" wire:model="questionAnswer" aria-label="questionAnswer">
                                                    {!! $questionAnswer !!}
                                                </div>
                                                <label>{{ __('Respostas') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <x-danger-button wire:click="resetInput">
                        <i wire:target="resetInput" wire:loading.remove ></i>
                        <span class="align-middle d-sm-inline-block d-none">
                            <span wire:target="resetInput" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            {{ __('Limpar') }}
                        </span>
                    </x-danger-button>

                    @if($finish)
                        <x-success-button wire:click="save">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1">
                                <span wire:target="save" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                {{ __('Cadastrar') }}
                            </span>
                            <i class= wire:target="save" wire:loading.remove></i>
                        </x-success-button>
                    @endif
                </div>


            @elseif($this->steps === 3)

            @endif
        </div>

        @if($this->steps == 1)
            <div class="d-flex justify-content-end mt-3">
                <x-success-button wire:click="nextStep">
            <span class="align-middle d-sm-inline-block d-none me-sm-1">
                <span wire:target="nextStep" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                {{ __('Avançar') }}
            </span>
                    <i class= wire:target="nextStep" wire:loading.remove></i>
                </x-success-button>
            </div>
        @endif

    </div>
        @push('custom-script')
            <script type="text/javascript">
                const natureSearchUrl = '{{ route('nature.search') }}';

                const setPropertyValue = (property, value) => {
                    @this.
                    set(property, value)
                }
            </script>

            <script src="{{ asset('assets/js/pages/occurrence.js') }}"></script>
        @endpush
</div>
