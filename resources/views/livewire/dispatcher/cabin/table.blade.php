<div>
    <div class="row gy-4">
        <style>
            .table-hover tbody tr {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                will-change: transform, box-shadow;
            }

            .table-hover tbody tr:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            }
            table.table {
                border-collapse: collapse;
            }

            table.table td {
                padding: 0.7px;
            }
        </style>

        <div class="col-sm-12 col-lg-1">
            <div class="card">
                <div class="card-body p-2">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <x-success-button
                            class="btn-app btn-block w-100 btn-sm mt-1"
                            wire:click="showCreate"
                            title="{{ __('Gerar Ocorrência') }}"
                            data-bs-toggle="tooltip"
                            data-bs-placement="right"
                        >
                            <span class="mdi mdi-plus-box-outline"></span>
                        </x-success-button>


                    </div>

                </div>
            </div>
        </div>

        <style>
            .scrollable-tbody {
                display: block;
                max-height: 570px;
                overflow-y: auto;
                overflow-x: hidden;
            }
            .table thead, .table tbody tr {
                display: table;
                width: 100%;
                table-layout: fixed;
            }
            .table {
                width: 100%;
            }
        </style>

        <div class="col-sm-12 col-lg-1">
            <div class="card">
                <div class="table-responsive text-center">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="text-danger">VTR</th>
                        </tr>
                        </thead>
                        <tbody class="scrollable-tbody table-border-bottom-0">
                        @if (!empty($occurrencesWithPatrol))
                            @foreach ($occurrencesWithPatrol as $occurrence)
                                <tr x-data @click="if ($event.target.type !== 'checkbox' && window.getSelection().toString().length === 0) @this.call('showCommitted', '{{ $occurrence->id }}')">
                                    <td>{{ $occurrence->patrol }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">
                                    <div class="text-center">
                                        <i class="fas fa-info-circle"></i> {{ __('Nenhuma.') }}
                                    </div>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-10">
            <div class="card">
                <div class="table-responsive text-nowrap text-center">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('ENDEREÇO') }}</th>
                            <th>{{ __('NAT') }}</th>
                            <th>{{ __('OPM') }}</th>
                            <th>{{ __('ESPERA') }}</th>
                            <th>{{ __('OCO') }}</th>
                        </tr>
                        </thead>
                        <tbody class="scrollable-tbody table-border-bottom-0">
                            <div>
                            @if(!empty($occurrencesWithoutPatrol))
                                @foreach($occurrencesWithoutPatrol as $occurrence)
                                    <tr x-data @click="if ($event.target.type !== 'checkbox' && window.getSelection().toString().length === 0) @this.call('showPending', '{{ $occurrence->id }}')"
                                        @unless(empty($occurrence->observe))
                                            class="bg-success"
                                        @endunless
                                    >
                                        <td>{{ $occurrence->address->street }}, {{ $occurrence->address->number }}</td>
                                        <td>{{ $occurrence->nature->code }}</td>
                                        <td>{{ $occurrence->battalion->name ?? 'Não disponível' }} - {{ $occurrence->company ?? 'Não disponível' }}</td>
                                        <td>{{ $occurrence->timeElapsed }}</td>
                                        <td>{{ $occurrence->occurrence }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">
                                        <div class="text-center">
                                            <i class="fas fa-info-circle"></i> {{ __('Nenhum Batalhão Encontrado.') }}
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>
</div>
