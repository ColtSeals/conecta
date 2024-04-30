<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-account-circle-outline mdi-24px fs-4"></span>
            {{ __('Cadastrar Usuário') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">

                <div class="col-sm-12 col-lg-4">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="identification" aria-label="identification">
                            <option selected>{{ __('Selecione uma opção') }}</option>
                            <option value="Civil">{{ __('Civil') }}</option>
                            <option value="Militar">{{ __('Militar') }}</option>
                        </select>

                        <x-label>{{ __('Identificação') }}</x-label>
                    </div>
                    <x-input-error for="identification" />
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="form-floating form-floating-outline">
                        <select class="form-select" wire:model="patent" aria-label="patent">
                            <option selected>{{ __('Selecione uma opção') }}</option>
                            <option value="CIVIL">{{ __('CIVIL') }}</option>
                            <option value="SD-PM">{{ __('SD') }}</option>
                            <option value="CB-PM">{{ __('CB') }}</option>
                            <option value="3ºSGT-PM">{{ __('3ºSGT') }}</option>
                            <option value="2°SGT-PM">{{ __('2°SGT') }}</option>
                            <option value="1°SGT-PM">{{ __('1°SGT') }}</option>
                            <option value="SUBTEN-PM">{{ __('SUBTEN') }}</option>
                            <option value="ASP OF-PM">{{ __('ASP OF') }}</option>
                            <option value="2°TEN-PM">{{ __('2°TEN') }}</option>
                            <option value="1°TEN-PM">{{ __('1°TEN') }}</option>
                            <option value="CAP-PM">{{ __('CAP') }}</option>
                            <option value="MAJ-PM ">{{ __('MAJ') }}</option>
                            <option value="TENCEL-PM">{{ __('TENCEL') }}</option>
                            <option value="CEL-PM">{{ __('CEL') }}</option>
                        </select>

                        <x-label>{{ __('Patente') }}</x-label>
                    </div>
                    <x-input-error for="patent" />
                </div>

                <div class="col-sm-12 col-lg-4">
                    <div class="input-group input-group-merge">
                                <span class="input-group-text">
                                    <span class="mdi mdi-card-account-details"></span>
                                </span>
                        <div class="form-floating form-floating-outline">
                            <x-input id="plate" wire:model="license" type="text" maxlength="161" placeholder="{{ __('Digite a Matricula') }}" />
                            <x-label>{{ __('Matrícula') }}</x-label>
                        </div>
                    </div>
                    <x-input-error for="license" />
                </div>

                <div class="col-sm-12 col-lg-9">
                    <div class="input-group input-group-merge">
                                    <span class="input-group-text">
                                        <span class="mdi mdi-card-account-details"></span>
                                    </span>

                        <div class="form-floating form-floating-outline">
                            <x-input id="plate" wire:model="name" type="text" maxlength="161" placeholder="{{ __('Digite o Nome Completo') }}" required />
                            <x-label required>{{ __('Nome Completo') }}</x-label>
                        </div>
                    </div>
                    <x-input-error for="name" />
                </div>

                <div class="col-sm-12 col-lg-3">
                    <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                            <input type="{{ $showPassword ? 'text' : 'password' }}" id="password" wire:model="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                            <label for="password">{{ __('Senha') }}</label>
                        </div>
                        <span class="input-group-text cursor-pointer" wire:click="togglePasswordVisibility">
                            <i class="mdi {{ $showPassword ? 'mdi-eye-off-outline' : 'mdi-eye-outline' }}"></i>
                        </span>
                    </div>
                    <x-input-error for="password" />
                </div>

                <div class="form-check custom-option custom-option-basic d-flex justify-content-between mt-3">
                    @foreach(['atendent' => 'ATENDENTE', 'dispatcher' => 'DESPACHO', 'supervision' => 'SUPERVISÃO', 'manager' => 'STQ', 'certificates' => 'CERTIDÕES', 'technique' => 'TÉCNICA', 'superadmin' => 'SUPER ADMIN'] as $roleValue => $roleName)
                        <label class="form-check-label custom-option-content" for="customCheck{{ ucfirst($roleValue) }}">
                            <input class="form-check-input" type="checkbox" wire:model="roles.{{ $roleValue }}" value="{{ $roleValue }}" id="customCheck{{ ucfirst($roleValue) }}">
                            <span class="custom-option-body">
                                <small class="option-text">{{ $roleName }}</small>
                            </span>
                        </label>
                    @endforeach
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
