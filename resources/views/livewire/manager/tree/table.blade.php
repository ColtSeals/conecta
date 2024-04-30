<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 text-sm-center col-md-6">
                    <label class="d-flex align-items-center">
                        <span>{{ __('Mostrar') }}</span>
                        <select class="form-select ms-2" style="width: 75px;" wire:model.blur="perPage">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                        <span class="ms-2">{{ __('Resultados') }}</span>
                    </label>
                </div>

                <div class="col-sm-12 col-md-6">
                    <label class="d-flex justify-content-md-end align-items-center">
                        {{ __('Pesquisar') }}: <x-input wire:model.live="search" type="search" style="width: 250px;" class="ms-md-2" />
                    </label>
                </div>

                <hr class="m-0 mt-3">

                <div class="col-12 mt-3">
                    <div class="form-floating form-floating-outline">
                        <div wire:ignore>
                            <select id="select2Table" class="form-select" aria-label="nature">
                                <option value="" disabled selected>Selecione uma opção</option>
                                @foreach(\App\Models\Nature::query()->orderBy('code', 'asc')->get() as $nature)
                                    <option value="{{ $nature->id }}">{{ $nature->code }} - {{ $nature->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('STATUS') }}</th>
                        <th>{{ __('ÁRVORE') }}</th>
                        <th class="text-center">{{ __('NATUREZA') }}</th>
                        <th class="text-center">{{ __('CRIADOR') }}</th>
                        <th class="text-center">{{ __('ÚLTIMO EDITOR') }}</th>
                        <th class="text-center">{{ __('DATA DE CRIAÇÃO') }}</th>
                        <th class="text-center">{{ __('DATA DE ATUALIZAÇÃO') }}</th>
                        <th class="text-center">{{ __('AÇÕES') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @if($trees->total() > 0)
                        @foreach($trees as $tree)
                            <tr>
                                <td>
                                    <span class="badge bg-{{ $tree->active ? 'success' : 'warning' }}">
                                        {{ $tree->active ? 'Produção' : 'Desenvolvimento' }}
                                    </span>
                                </td>

                                <td>{{ $tree->name }}</td>

                                <td class="text-center">{{ $tree->nature->code }}</td>

                                <td>
                                    <div class="d-flex justify-content-center align-items-center user-name">
                                        <div class="avatar avatar-sm me-2">
                                            <img src="{{ $tree->userCreator->profile_photo_url }}" alt="{{ $tree->userCreator->name }}" class="rounded-circle">
                                        </div>

                                        <div class="d-flex flex-column">
                                            <span class="emp_name text-truncate text-uppercase text-heading fw-medium">
                                                {{ $tree->userCreator->patent }} {{ $tree->userCreator->category }} {{ $tree->userCreator->name  }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center align-items-center user-name">
                                        <div class="avatar avatar-sm me-2">
                                            <img src="{{ $tree->userCreator->profile_photo_url }}" alt="{{ $tree->userCreator->name }}" class="rounded-circle">
                                        </div>

                                        <div class="d-flex flex-column">
                                            <span class="emp_name text-truncate text-uppercase text-heading fw-medium">
                                                {{ $tree->userCreator->patent }} {{ $tree->userCreator->category }} {{ $tree->userCreator->name  }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">{{ $tree->created_at->format('d/m/Y - H:i:s') }}</td>
                                <td class="text-center">{{ $tree->updated_at->format('d/m/Y - H:i:s') }}</td>

                                <td  class="text-center">
                                    <span class="text-nowrap">
                                        <button wire:click="redirectManagerTreeShow('{{ $tree->id }}')" class="btn btn-sm btn-icon btn-text-secondary rounded-pill btn-icon me-2"
                                                aria-label="{{ __('Editar Batalhão') }}"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="{{ __('Editar Arvore') }}"
                                        >
                                            <i class="mdi mdi-pencil-outline mdi-20px"></i>
                                        </button>




                                     <button wire:click="toggleTreeStatus('{{ $tree->id }}')"
                                             class="btn btn-sm btn-icon {{ $tree->active ? 'btn-text-success' : 'btn-text-danger' }} rounded-pill btn-icon me-2"
                                             aria-label="{{ $tree->active ? __('Desativar Árvore') : __('Ativar Árvore') }}"
                                             data-bs-toggle="tooltip"
                                             data-bs-placement="top"
                                             data-bs-original-title="{{ $tree->active ? __('Desativar Árvore') : __('Ativar Árvore') }}">

                                             @if($tree->active)
                                                 <span class="mdi mdi-cloud-check-outline mdi-20px"></span>
                                             @else
                                                 <span class="mdi mdi-cloud-off-outline mdi-20px"></span>
                                             @endif
                                     </button>

                                        <button class="btn btn-sm btn-icon btn-text-danger rounded-pill btn-icon delete-record"
                                                wire:click="deleteTree('{{ $tree->id }}')"
                                                aria-label="{{ __('Excluir Batalhão') }}"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-original-title="{{ __('Excluir Batalhão') }}">
                                              <i class="mdi mdi-delete-outline mdi-20px"></i>
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">
                                <div class="text-center">
                                    {{ __('Nenhum registro encontrado') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @if($trees->total() > 0)
            <div class="card-footer d-flex justify-content-{{ $trees->total() > 10 ? 'between' : 'center' }}">
                <span>
                    {{ __(':result registro(s) encontrado(s)', ['result' => $trees->total()]) }}
                </span>
            </div>
        @endif
    </div>

    @push('custom-script')
        <script type="text/javascript">
                if (select2Table) select2Table.on('change', function (e) {
                    @this.set('nature', e.target.value);
                });
        </script>
    @endpush
</div>
