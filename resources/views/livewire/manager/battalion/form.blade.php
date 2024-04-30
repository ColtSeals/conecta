<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Cadastrar Batalhão') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">


                <div class="col-sm-12 col-lg-4">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="police_command" aria-label="police_command">
                            <option selected>{{ __('Selecione uma Categoria') }}</option>
                            <option value="CPA/M1">CPA/M1</option>
                            <option value="CPA/M2">CPA/M2</option>
                            <option value="CPA/M3">CPA/M3</option>
                            <option value="CPA/M4">CPA/M4</option>
                            <option value="CPA/M5">CPA/M5</option>
                            <option value="CPA/M6">CPA/M6</option>
                            <option value="CPA/M7">CPA/M7</option>
                            <option value="CPA/M8">CPA/M8</option>
                            <option value="CPA/M9">CPA/M9</option>
                            <option value="CPA/M10">CPA/M10</option>
                            <option value="CPA/M11">CPA/M11</option>
                            <option value="CPA/M12">CPA/M12</option>
                        </select>
                        <x-label>{{ __('CPA') }}</x-label>
                    </div>
                    <x-input-error for="police_command"/>
                </div>


                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <span class="mdi mdi-police-station"></span>
                        </span>

                        <div class="form-floating form-floating-outline">
                            <x-input wire:model="name" type="text" maxlength="255" placeholder="{{ __('Digite o Nome do Batalhão') }}" required />
                            <x-label required>{{ __('Nome do Batalhão') }}</x-label>
                        </div>
                    </div>

                    <x-input-error for="name" />
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="specialty" aria-label="personSituation">
                            <option selected disabled>{{ __('Selecione uma Categoria') }}</option>

                            @foreach(\App\Models\BattalionSpecialty::query()->get() as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </select>

                        <x-label required>{{ __('Categoria do Batalhão') }}</x-label>
                    </div>
                </div>
            </div>
        </div>

        <hr class="m-0 mt-1">

        <div class="modal-footer d-flex justify-content-between mt-3">
            <x-danger-button data-bs-dismiss="modal">
                <i class="mdi mdi-close me-sm-1 me-0"></i>

                <span class="align-middle d-sm-inline-block d-none">
                        {{ __('Fechar') }}
                    </span>
            </x-danger-button>

            <x-success-button type="submit" wire:target="save" wire:loading.attr="disabled">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">
                        <span wire:target="save" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        {{ __('Cadastrar') }}
                    </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-success-button>
        </div>
    </form>
</div>
