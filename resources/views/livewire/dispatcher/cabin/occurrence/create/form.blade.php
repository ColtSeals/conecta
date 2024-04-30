<div>
    <div class="modal-header">
        <h4 class="modal-title">
            {{ __('Cadastrar Ocorrência') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">

                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="atendent" type="text"
                                     placeholder="{{ __('atendente') }}" disabled="true" />
                            <x-label >{{ __('Usuário') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="atendent"/>
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="phone" type="text" maxlength="15"
                                     placeholder="{{ __('Insira o número de telefone') }}"  />
                            <x-label  >{{ __('Telefone') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="phone"/>
                </div>


                <div class="col-sm-12 col-lg-4">
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
                <div class="col-sm-12 col-lg-7">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="nature" aria-label="nature">
                            <option selected value="">{{ __('Selecione uma Natureza') }}</option>
                            @foreach(\App\Models\Nature::query()->get() as $nature)
                                <option value="{{ $nature->id }}">{{ $nature->code }} - {{ $nature->description }}</option>
                            @endforeach
                        </select>
                        <x-label  >{{ __('Natureza') }}</x-label>
                    </div>
                    <x-input-error for="nature"/>

                </div>



                <div class="col-sm-12 col-lg-5">
                    <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="state" type="text"
                                     placeholder="{{ __('Insira o Estado') }}"  />
                            <x-label  >{{ __('Estado') }}</x-label>
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
                                     placeholder="{{ __('Insira o Município') }}"  />
                            <x-label  >{{ __('Município') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="city"/>
                </div>
                <div class="col-sm-12 col-lg-7">
                    <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="street" type="text"
                                     placeholder="{{ __('Insira o Endereço ou POI') }}"  />
                            <x-label  >{{ __('Endereço ou POI') }}</x-label>
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
                                     placeholder="{{ __('Insira o Número') }}"  />
                            <x-label  >{{ __('Número') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="number"/>
                </div>

                <div class="col-sm-12 col-lg-5">
                    <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="neighborhood" type="text"
                                     placeholder="{{ __('Insira o Bairro') }}"  />
                            <x-label  >{{ __('Bairro') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="neighborhood"/>
                </div>
                <div class="col-sm-12 col-lg-7">
                    <div class="input-group input-group-merge">
                                                    <span class="input-group-text">
                                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="reference" type="text"
                                     placeholder="{{ __('Informe a Referência') }}"  />
                            <x-label>{{ __('Referência') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="reference"/>
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="battalionId" aria-label="battalionId">
                            <option selected value="">{{ __('Selecione uma Categoria') }}</option>
                            @foreach(\App\Models\Battalion::query()->get() as $battalion)
                                <option value="{{ $battalion->id }}">{{ $battalion->name }}</option>
                            @endforeach
                        </select>
                        <x-label  >{{ __('Categoria do Batalhão') }}</x-label>
                    </div>
                    <x-input-error for="battalionId"/>

                </div>


                <div class="col-sm-12 col-lg-4">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="company" aria-label="company">
                            <option selected >{{ __('Selecione uma Categoria') }}</option>
                            <option value="1ª Cia">1ª Companhia</option>
                            <option value="2ª Cia">2ª Companhia</option>
                            <option value="3ª Cia">3ª Companhia</option>
                            <option value="4ª Cia">4ª Companhia</option>
                            <option value="5ª Cia">5ª Companhia</option>
                            <option value="6ª Cia">6ª Companhia</option>
                            <option value="7ª Cia">7ª Companhia</option>
                            <option value="8ª Cia">8ª Companhia</option>
                        </select>

                        <x-label  >{{ __('Companhia') }}</x-label>
                    </div>
                    <x-input-error for="battalionId"/>
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                                <span class="input-group-text">
                                                </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="patrol" type="text"
                                     placeholder="{{ __('Insira a viatura') }}"/>
                            <x-label>{{ __('Viatura') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="patrol"/>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-lg-12">
                                                <div class="form-floating form-floating-outline ">
                                                    <textarea class="form-control" wire:model="questionAnswer"
                                                              placeholder="{{ __('Digite o Histórico Inicial') }}" style="height: 150px;" aria-label="questionAnswer"></textarea>

                                                    <x-label>{{ __('Histórico Inicial') }}</x-label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal-footer d-flex justify-content-between mt-3">
            <x-danger-button data-bs-dismiss="modal">

                <span class="align-middle d-sm-inline-block d-none">
                        {{ __('Fechar') }}
                    </span>
            </x-danger-button>

            <x-success-button type="submit" wire:target="save" wire:loading.attr="disabled">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">
                        <span wire:target="save" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        {{ __('Cadastrar') }}
                    </span>

                <i wire:loading.remove wire:target="save"></i>
            </x-success-button>
        </div>
    </form>
    @script
    <script>
        $(document).ready(function() {
            console.log('O JavaScript do modal foi iniciado.');
        });
    </script>
    @endscript
</div>
