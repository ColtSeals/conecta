<div>
    <div class="modal-header" style="display: flex; align-items: center; justify-content: space-between;">

        <h4 class="modal-title" style="text-align: center; flex-grow: 1;">
            {{ __('Detalhes de Ocorrência:') }}{{ $data['occurrence'] ?? 'Não disponível' }}
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>


    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-3">
                <div class="col-12 col-lg-3">
                    <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask"
                                   placeholder="Digite o Telefone" value="{{ $data['phone'] ?? 'Não disponível' }}" disabled />
                            <label for="modalEditUserPhone">{{ __('Telefone') }}</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text" maxlength="161"
                                      placeholder="{{ __('Digite o Nome') }}" value="{{ $data['requestor'] ?? 'Não disponível' }}" disabled />
                            <x-label>{{ __('Solicitante') }}</x-label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                    <span class="input-group-text">
                    </span>

                        <div class="form-floating form-floating-outline">
                            <input class="form-control" wire:model="bpm" type="text"
                                   placeholder="{{ __('Digite o Batalhão') }}" value="{{ $data['name'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Batalhão') }}</x-label>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text" placeholder="{{ __('Insira a Companhia') }}" value="{{ $data['company'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Companhia') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="company" />
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text" placeholder="{{ __('Insira a Companhia') }}" value="{{ $data['atendent'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Usuário') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="atendent" />
                </div>


                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text" placeholder="{{ __('Insira o Estado') }}" value="{{ $data['state'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Estado') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="state" />
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Insira o Município') }}" value="{{ $data['city'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Município') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="city" />
                </div>

                <div class="col-sm-12 col-lg-5">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Insira o Município') }}" value="{{ $data['street'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Endereço') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="street" />
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Insira o Número') }}" value="{{ $data['number'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Número') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="number" />
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Insira o Bairro') }}" value="{{ $data['neighborhood'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Bairro') }}</x-label>
                        </div>
                    </div>
                    <x-input-error for="neighborhood" />
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="reference" type="text"
                                     placeholder="{{ __('Informe a Referência') }}" value="{{ $data['reference'] ?? 'Não disponível' }}" disabled />
                            <x-label>{{ __('Referência') }}</x-label>
                        </div>
                    </div>
                    <x-input-error for="reference" />
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">
                                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input  type="text"
                                      placeholder="{{ __('Informe a Natureza') }}" value="{{ $data['code'] ?? 'Não disponível' }} - {{ $data['description'] ?? 'Não disponível' }}" disabled />
                            <x-label  >{{ __('Natureza Inicial') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="nature" />
                </div>

                <div class="col-sm-12 col-lg-2">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                        </span>
                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="data.patrol" type="text" placeholder="{{ __('Insira a Patrulha') }}" disabled="true" />
                            <x-label  >{{ __('Patrulha') }}</x-label>
                        </div>
                    </div>
                    <x-input-error for="data.patrol" />
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0">
                            <div class="nav-align-top">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="nav-link active waves-effect" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-initial"
                                                aria-controls="navs-top-initial" aria-selected="true">
                                            {{ __('Historico Inicial') }}
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-complement"
                                                aria-controls="navs-top-finish" aria-selected="false" tabindex="-1">
                                            {{ __('Historico Final') }}
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="tab-content p-0">
                            <div class="tab-pane fade show active" id="navs-top-initial" role="tabpanel">
                                <div class="row gy-4 px-3 mt-3 mb-3">
                                    <div class="col-12">
                                        <div class="form-floating form-floating-outline">
                                            <div class="form-control" style="height: 193px; overflow-y: auto;" wire:model="questionAnswer" aria-label="questionAnswer">
                                                {!! $data['answers'] ?? 'Não disponível' !!}
                                            </div>
                                            <label>{{ __('Historico Inicial') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="navs-top-complement" role="tabpanel">
                                <div class="row gy-4 px-3 mt-3 mb-3">
                                    <div class="col-12">
                                        <div class="form-floating form-floating-outline">
                                            <div class="form-control" style="height: 193px; overflow-y: auto;" wire:model="questionAnswer" aria-label="questionAnswer">
                                                @if(!empty($data['observe']))
                                                    {{ __('Ocorrência Observada:') }} {!! $data['observe'] !!}
                                                @endif
                                                @if(!empty($data['observe']) && !empty($data['abort']))
                                                    <br>
                                                @endif
                                            </div>
                                            <label>{{ __('Respostas') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="navs-top-observe" role="tabpanel">
                                <div class="row p-3">
                                    <div class="col-12">
                                        <div class="form-floating form-floating-outline ">
                                            <textarea class="form-control" placeholder="{{ __('Digite os dados da Observação') }}"
                                                      style="height: 100px;" aria-label="data.observe" wire:model="data.observe"></textarea>
                                            <label>
                                                Observar Ocorrência
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-end mt-3">

                                    <x-success-button type="button" wire:click="observation" wire:loading.attr="disabled">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">
                                            <span wire:target="observation" wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            {{ __('Observar') }}
                                        </span>
                                        <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="observe"></i>
                                    </x-success-button>

                                </div>
                            </div>


                            <div class="tab-pane fade" id="navs-top-redirect" role="tabpanel">
                                <div class="row p-3">

                                    <div class="col-12">
                                        <div class="form-floating form-floating-outline ">
                                            <textarea class="form-control" placeholder="{{ __('Digite os dados complementares') }}"
                                                      style="height: 100px;" aria-label="data.redirect" wire:model="data.redirect"></textarea>
                                            <label>
                                                Redirecionar Ocorrência
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-11 mt-3 px-3 mb-3">
                                        <div class="form-floating form-floating-outline">
                                            <div wire:ignore>
                                                <select id="select" class="form-select" aria-label="redirect" wire:model="data.battalion_id">
                                                    <option value="" selected>{{ __('Selecione uma opção') }}</option>
                                                    @foreach(\App\Models\Battalion::query()->orderBy('name', 'asc')->get() as $battalion)
                                                        <option value="{{ $battalion->id }}">{{ $battalion->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('data.battalion_id') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>




                                    <div class="col-sm-12 col-lg-1 mt-3">
                                        <x-danger-button
                                            class="btn-app btn-block btn-sm w-100"
                                            wire:click="redirected"
                                            title="{{ __('Redirecionar Ocorrência') }}"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="right"
                                        >
                                            <span class="mdi mdi-flash-alert-outline"></span>
                                        </x-danger-button>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="navs-top-finish" role="tabpanel">
                                <div class="row p-3">
                                    <div class="col-12">
                                        <div class="form-floating form-floating-outline ">
                                            <textarea class="form-control" placeholder="{{ __('Digite os dados') }}"
                                                      style="height: 100px;" aria-label="data.finish" wire:model="data.finish"></textarea>
                                            <label>
                                                Encerrar Ocorrência
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-end mt-3">

                                    <x-danger-button type="button" wire:click="finished" wire:loading.attr="disabled">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">
                                            <span wire:target="finished" wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            {{ __('Encerrar Ocorrência') }}
                                        </span>
                                        <i class= wire:loading.remove wire:target="observe"></i>
                                    </x-danger-button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="m-0 mt-1">

        <div class="modal-footer d-flex justify-content-start mt-3">
            <x-danger-button data-bs-dismiss="modal">

                <span class="align-middle d-sm-inline-block d-none">
                        {{ __('Fechar') }}
                    </span>
            </x-danger-button>
        </div>
    </form>
</div>
