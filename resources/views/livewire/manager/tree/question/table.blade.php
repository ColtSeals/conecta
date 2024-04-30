<div>
    @if($questions)
        <form wire:submit="save">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        @foreach ($questions as $index => $question)
                            <div class="col-sm-12 col-lg-7">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-progress-question"></span>
                                    </span>

                                    <div class="form-floating form-floating-outline">
                                        <x-input wire:model.blur="questions.{{ $index }}.name" type="text" maxlength="255" placeholder="{{ __('Insira a 1º Pergunta') }}" />
                                        <x-label required>{{ __($index + 1 . 'º Pergunta') }}</x-label>
                                    </div>
                                </div>

                                <x-input-error for=questions.{{ $index }}.name" />
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-select @error("questions.$index.type") is-invalid @enderror" wire:model.blur="questions.{{ $index }}.type" aria-label="option">
                                        <option value="">{{ __('Nenhum Tipo de Resposta') }}</option>

                                        @foreach(\App\Enums\QuestionTypeEnum::enumToArray() as $questionType)
                                            <option value="{{ $questionType }}">{{ __($questionType->value) }}</option>
                                        @endforeach
                                    </select>

                                    <x-label required>{{ __('Tipo de Resposta') }}</x-label>
                                </div>

                                <x-input-error for="questions.{{ $index }}.type" />
                            </div>

                            <div class="col-sm-12 col-lg-1">
                                <x-secondary-button :disabled="!$question['type']" class="btn-lg w-100 waves-effect"
                                                wire:click="showAnswer('{{ $question['id'] }}', {{ $index + 1 }})"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="{{ __('Gerenciar Respostas') }}"
                                >
                                    <i class="mdi mdi-progress-pencil fs-4"></i>
                                </x-secondary-button>
                            </div>
                            <div class="col-sm-12 col-lg-1">
                                <x-danger-button class="btn-lg w-100 waves-effect"
                                             wire:click="removeQuestion('{{ $question['id'] }}')"
                                             data-bs-toggle="tooltip"
                                             data-bs-placement="top"
                                             data-bs-original-title="{{ __('Remover Pergunta') }}"
                                >
                                    <i class="mdi mdi-close fs-4"></i>
                                </x-danger-button>
                            </div>

                            @if(!$loop->last) <hr class="m-0 mt-3"> @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <x-danger-button wire:click="resetTree" wire:target="resetTree" wire:loading.attr="disabled">
                    <i wire:target="resetTree" wire:loading.remove class="mdi mdi-close me-sm-1 me-0"></i>

                    <span class="align-middle d-sm-inline-block d-none">
                        {{ __('Redefinir') }}

                        <span wire:target="resetTree" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                    </span>
                </x-danger-button>

                <x-success-button type="submit" wire:target="save" wire:loading.attr="disabled">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">
                        <span wire:target="save" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        {{ __('Avançar') }}
                    </span>

                    <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
                </x-success-button>
            </div>
        </form>
    @else
        <div class="alert alert-success alert-dismissible" role="alert">
            <h4 class="alert-heading d-flex align-items-center">
                <i class="mdi mdi-check-circle-outline mdi-24px me-2"></i>
                {{ __('Árvore Criada') }}
            </h4>

            <hr>

            <p class="mb-0">
                {{ __('Olá! Bem-vindo à configuração da árvore de decisões. Para iniciar o processo de criação, basta clicar no botão de cadastro de perguntas acima. Após isso, você poderá configurar as suas ações correspondentes.') }}
            </p>
        </div>
    @endif
</div>
