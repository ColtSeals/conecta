<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-cog-outline fs-3"></span>
            {{ __('Gerenciar '.$index.'º Pergunta') }} | {{ $question->name }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <div class="modal-body">
        <div class="row g-3">
            @if($question && $answers)
                @foreach($answers as $index => $answer)
                    @if($question->type === 'YesOrNo')
                        @if($answer['name'] === 'Yes')
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-sm-12 col-lg-6">
                                        <x-success-button class="btn-lg btn-block waves-effect w-100">
                                            {{ __('SIM') }}
                                        </x-success-button>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <x-secondary-button class="btn-lg w-100 waves-effect"
                                                            wire:click="showAnswerRedirect('{{ $answer['id'] }}')"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            data-bs-original-title="{{ __('Próxima Pergunta') }}"
                                        >
                                            <i class="mdi mdi-page-next fs-4"></i>
                                        </x-secondary-button>
                                    </div>
                                </div>
                            </div>
                        @elseif($answer['name'] === 'No')
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-sm-12 col-lg-6">
                                        <x-danger-button class="btn-lg btn-block waves-effect w-100">
                                            {{ __('NÃO') }}
                                        </x-danger-button>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <x-secondary-button class="btn-lg w-100 waves-effect"
                                                            wire:click="showAnswerRedirect('{{ $answer['id'] }}')"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            data-bs-original-title="{{ __('Próxima Pergunta') }}"
                                        >
                                            <i class="mdi mdi-page-next fs-4"></i>
                                        </x-secondary-button>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @elseif($question->type === 'TextArea')
                        <div class="col-lg-11">
                            <div class="input-group">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-text-box-edit-outline"></span>
                                    </span>

                                    <div class="form-floating form-floating-outline">
                                        <x-input wire:model.blur="answers.{{ $index }}.answer" type="text" placeholder="{{ __('Insira o texto auxiliar') }}" required/>
                                        <x-label required>{{ __('Texto Auxiliar') }}</x-label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-12 col-lg-1">
                            <x-secondary-button class="btn-lg w-100 waves-effect"
                                                wire:click="showAnswerRedirect('{{ $answer['id'] }}')"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="{{ __('Próxima Pergunta') }}"
                            >
                                <i class="mdi mdi-page-next fs-4"></i>
                            </x-secondary-button>
                        </div>
                    @elseif($question->type === 'Orientation')
                        <div class="col-11">
                            <div class="form-floating form-floating-outline">
                                <x-input wire:model.blur="answers.{{ $index }}.answer" type="text" placeholder="{{ __('Insira o texto auxiliar') }}"  aria-label="orientation" required/>
                                <x-label>{{ __('Orientação') }}</x-label>
                            </div>
                        </div>



                        <div class="col-sm-12 col-lg-1">
                            <x-secondary-button class="btn-lg w-100 waves-effect"
                                                wire:click="showAnswerRedirect('{{ $answer['id'] }}')"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="{{ __('Próxima Pergunta') }}"
                            >
                                <i class="mdi mdi-page-next fs-4"></i>
                            </x-secondary-button>
                        </div>

                    @elseif($question->type === 'Multiple')
                        <div class="col-sm-12 col-lg-11">
                            <div class="input-group">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-progress-question"></span>
                                    </span>

                                    <div class="form-floating form-floating-outline">
                                        <x-input wire:model.blur="answers.{{ $index }}.name" type="text" placeholder="{{ __('Insira a Resposta') }}" required/>
                                        <x-label required>{{ __($index + 1 . 'º Pergunta') }}</x-label>
                                    </div>

                                    @if($loop->last)
                                        <x-success-button wire:click="addOption" class="waves-effect">
                                            <i class="mdi mdi-plus"></i>
                                        </x-success-button>
                                    @else
                                        <x-danger-button wire:click="removeOption({{ $index }})" class="waves-effect">
                                            <i class="mdi mdi-close"></i>
                                        </x-danger-button>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-lg-1">
                            <x-secondary-button class="btn-lg w-100 waves-effect"
                                                wire:click="showAnswerRedirect('{{ $answer['id'] }}')"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="{{ __('Próxima Pergunta') }}"
                            >
                                <i class="mdi mdi-page-next fs-4"></i>
                            </x-secondary-button>
                        </div>

                        @if(!$loop->last) <hr class="m-0 mt-3"> @endif
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
