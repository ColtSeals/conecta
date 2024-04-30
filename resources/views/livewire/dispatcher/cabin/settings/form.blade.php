<div>

    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-police-badge-outline mdi-24px fs-3"></span>
            {{ __('Configurar Cabine') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="save">
        <div class="modal-body">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header p-0">
                            <div class="nav-align-top">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                                            <i class="tf-icons mdi mdi-finance me-1"></i> Estatistícas <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">3</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
                                            <i class="tf-icons mdi mdi-book-open me-1"></i> OffCanvas
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">
                                            <i class="tf-icons mdi mdi-message-text-outline me-1"></i> Messages
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="form-check custom-option custom-option-icon">
                                                <label class="form-check-label custom-option-content" for="customCheckboxIcon1">
                                                <span class="custom-option-body">
                                                  <i class="mdi mdi-chart-arc"></i>
                                                  <span class="custom-option-title"> Estatisticas do sistema </span>
                                                  <small>se ativado ira mostrar as Estatisticas do Batalhão</small>
                                                </span>
                                                    <input class="form-check-input" type="checkbox" value="" id="customCheckboxIcon1" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                            <div class="card h-100">
                                                <div class="card-body row">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control" type="datetime-local" id="html5-datetime-local-input">
                                                            <label for="html5-datetime-local-input">Data Inicial</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="form-floating form-floating-outline">
                                                            <input class="form-control" type="datetime-local" id="html5-datetime-local-input">
                                                            <label for="html5-datetime-local-input">Data Final</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12 mt-2">
                                                        <div class="form-floating form-floating-outline">
                                                            <select class="form-select" wire:model="personSituation" aria-label="personSituation">
                                                                <option selected="" disabled="">Selecione </option>
                                                                <option value="Diponivel">01°BPM/M</option>
                                                                <option value="Manuntenção">02ºBPM/M</option>
                                                                <option value="Especial">03ºBPM/M</option>
                                                                <option value="Abastecimento">04ºBPM/M</option>
                                                                <option value="Assunção Manual">05ºBPM/M</option>
                                                                <option value="Assunção Manual">05ºBPM/M</option>
                                                            </select>

                                                            <x-label>{{ __('Redirecionar') }}</x-label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                                    <p style="text-align: center;">
                                        A opção "off-canvas" ajusta o local de abertura da janela de anotações para acesso rápido e adaptável.
                                    </p>

                                    <div class="col-sm-12 col-lg-12">
                                        <div class="card mb-4">

                                            <div class="row row-bordered g-0">

                                                <div class="col-sm-12 col-lg-3 p-4">
                                                    <div class="text-light small fw-medium">Off-Canvas Esquerda</div>

                                                    <div class="col-md-12 mt-2">
                                                        <button type="button" class="btn btn-secondary btn-app btn-block w-100 btn-sm" wire:click="$dispatch('showModal', { alias: 'occurrence.queries.person.form', maxWidth: 'xl' })" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Clique para Consultar Pessoas">
                                                            <span class="mdi mdi-arrow-left"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-3 p-4">
                                                    <div class="text-light small fw-medium">Off-Canvas Topo</div>

                                                    <div class="col-md-12 mt-2">
                                                        <button type="button" class="btn btn-secondary btn-app btn-block w-100 btn-sm" wire:click="$dispatch('showModal', { alias: 'occurrence.queries.person.form', maxWidth: 'xl' })" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Clique para Consultar Pessoas">
                                                            <span class="mdi mdi-arrow-up"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-lg-3 p-4">
                                                    <div class="text-light small fw-medium">Off-Canvas Rodapé</div>

                                                    <div class="col-md-12 mt-2">
                                                        <button type="button" class="btn btn-secondary btn-app btn-block w-100 btn-sm" wire:click="$dispatch('showModal', { alias: 'occurrence.queries.person.form', maxWidth: 'xl' })" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Clique para Consultar Pessoas">
                                                            <span class="mdi mdi-arrow-down"></span>
                                                        </button>
                                                    </div>
                                                </div>


                                                <div class="col-sm-12 col-lg-3 p-4">
                                                    <div class="text-light small fw-medium">Off-Canvas Direita (Padrão)</div>

                                                    <div class="col-md-12 mt-2">
                                                        <button type="button" class="btn btn-secondary btn-app btn-block w-100 btn-sm" wire:click="$dispatch('showModal', { alias: 'occurrence.queries.person.form', maxWidth: 'xl' })" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Clique para Consultar Pessoas">
                                                            <span class="mdi mdi-arrow-right"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                                    <p>
                                        Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi bears cake chocolate.
                                    </p>
                                    <p class="mb-0">
                                        Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                                        jelly.
                                    </p>
                                </div>
                            </div>
                        </div>
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
                        {{ __('Salvar') }}
                    </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="save"></i>
            </x-success-button>
        </div>
    </form>
</div>
