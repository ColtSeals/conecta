<div>
    <div class="card">

        <div class="table-responsive text-nowrap text-center">
            <table class="table table-sm table-striped">
                <thead class="table-light">
                <tr>
                    <th>{{ __('IDENTIFICAÇÃO') }}</th>
                    <th>{{ __('PATENTE') }}</th>
                    <th>{{ __('MATRICULA') }}</th>
                    <th>{{ __('NOME') }}</th>
                    <th>{{ __('NIVEL') }}</th>
                    <th>{{ __('CRIADO') }}</th>
                    <th>{{ __('ATUALIZADO') }}</th>
                    <th>{{ __('AÇÕES') }}</th>
                </tr>
                </thead>

                <tbody>
                @if($users->total() > 0)
                    @foreach($users as $user)
                        <tr class="odd">
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $user->identification }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $user->patent }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $user->license }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $user->name }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $user->level }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $user->created_at }}
                                </span>
                            </td>
                            <td>
                                <span class="text-nowrap text-heading">
                                    {{ $user->updated_at }}
                                </span>
                            </td>

                            <td>
                                <span class="text-nowrap">
                                        <button wire:click="showEditUser('{{ $user->id }}')" class="btn btn-sm btn-icon btn-text-secondary rounded-pill btn-icon me-2"
                                                aria-label="Delete Invoice"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="{{ __('Editar Permissão') }}"
                                        >
                                            <i class="mdi mdi-pencil-outline mdi-20px"></i>
                                        </button>

                                     <button wire:click="toggleUserStatus('{{ $user->id }}')" class="btn btn-sm btn-icon {{ $user->active ? 'btn-text-success' : 'btn-text-danger' }} rounded-pill btn-icon me-2"
                                             aria-label="{{ $user->active ? __('Desativar Usuário') : __('Ativar Usuário') }}"
                                             data-bs-toggle="tooltip"
                                             data-bs-placement="top"
                                             data-bs-original-title="{{ $user->active ? __('Desativar Usuário') : __('Ativar Usuário') }}"
                                     >
                                              @if($user->active)
                                             <span class="mdi mdi-cloud-check-outline mdi-20px"></span>
                                         @else
                                             <span class="mdi mdi-cloud-off-outline mdi-20px"></span>
                                         @endif
                                     </button>
                                </span>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="5">
                            <div class="text-center">
                                <i class="fas fa-info-circle"></i> {{ __('Nenhuma Natureza Encontrada.') }}
                            </div>
                        </td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>

    </div>


</div>
