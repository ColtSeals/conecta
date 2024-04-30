<div>
    <div class="modal-header">
        <h4 class="modal-title">
            <span class="mdi mdi-account-circle-outline mdi-24px fs-4"></span>
            {{ __('Deletar Usuário') }}
        </h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <hr class="m-0 mt-3">

    <form wire:submit="delete">

        <div class="row g-3">
            <div class="col-sm-12 col-lg-3">
                <div class="card p-0 mx-2 mt-3 mb-2">
                    <div class="card-header p-0">
                        <div class="nav-align-top">
                            <div class="user-avatar-section">
                                <div class="d-flex align-items-center flex-column">
                                    <img class="img-fluid rounded mb-2 mt-3" src="../../assets/img/illustrations/police-man.png" height="210" width="210" alt="User avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="tab-pane fade show active" id="navs-justified-monitored" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>{{ __('Identificação') }}:</td>
                                            <td>{{ $identification ?? __('Não informado') }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Matricula') }}:</td>
                                            <td>{{ $license ?? __('Não informado') }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Graduação') }}:</td>
                                            <td>{{ $patent ?? __('Não informado') }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Nivel') }}:</td>
                                            <td>{{ $level }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Nome') }}:</td>
                                            <td>{{ $nickname ?? __('Não informado') }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="card p-0 mx-2 mb-2 mt-3">
                    <div class="card-body">
                        <h6 class="card-header">Dados do Usuário</h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td>{{ __('Nome completo') }}:</td>
                                    <td>{{ $name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Função') }}:</td>
                                    <td>{{ $level }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Contato') }}:</td>
                                    <td>{{ $phone ?? __('Não informado') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Endereço') }}:</td>
                                    <td>{{ $street }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('CEP') }}:</td>
                                    <td>{{ $cep }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Bairro') }}:</td>
                                    <td>{{ $cep ?? __('Não informado')}}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Cidade') }}:</td>
                                    <td>{{ $city }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Batalhão') }}:</td>
                                    <td>{{ $battalion ?? __('Não informado') }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('E-mail') }}:</td>
                                    <td>{{ $email }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="m-0 mt-1">

        <div class="modal-footer d-flex justify-content-between mt-3">
            <x-secondary-button data-bs-dismiss="modal">
                <i class="mdi mdi-close me-sm-1 me-0"></i>

                <span class="align-middle d-sm-inline-block d-none">
                        {{ __('Fechar') }}
                    </span>
            </x-secondary-button>

            <x-danger-button type="submit" wire:target="delete" wire:loading.attr="disabled">
                    <span class="align-middle d-sm-inline-block d-none me-sm-1">
                        <span wire:target="delete" wire:loading class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        {{ __('Deletar') }}
                    </span>

                <i class="mdi mdi-arrow-right" wire:loading.remove wire:target="delete"></i>
            </x-danger-button>
        </div>

    </form>


</div>

