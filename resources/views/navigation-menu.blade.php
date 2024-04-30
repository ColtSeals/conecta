@php

    $userLevel = $userLevel ?? null;
@endphp

<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">

            <x-admin.sidebar.header wire:navigate>{{ __('COPOM') }}</x-admin.sidebar.header>

            @if((auth()->user()->hasRole('atendent') || auth()->user()->hasRole('superadmin')) && is_array(Session::get('selectedRole')) &&
                in_array(Session::get('selectedRole')[0], ['atendent', 'superadmin']))                <x-admin.sidebar.group title="{{ __('Atendente') }}" icon="">
                    <x-admin.sidebar.item icon="" router="occurrence.create" wire:navigate>{{ __('Cadastro Ocorrência') }}</x-admin.sidebar.item>
                    <x-admin.sidebar.item icon="" router="search.occurrence" wire:navigate>{{ __('Pesquisar Ocorrência') }}</x-admin.sidebar.item>
                </x-admin.sidebar.group>
            @endif

            @if((auth()->user()->hasRole('dispatcher') || auth()->user()->hasRole('superadmin')) && is_array(Session::get('selectedRole')) &&
                 in_array(Session::get('selectedRole')[0], ['dispatcher', 'superadmin']))
                <x-admin.sidebar.group title="{{ __('Despachador') }}" icon="">
                    <x-admin.sidebar.item icon="" router="dispatcher.cabin" wire:navigate>{{ __('Cabine Batalhão') }}</x-admin.sidebar.item>
                    <x-admin.sidebar.item icon="" router="search.dispatcher" wire:navigate>{{ __('Pesquisar Ocorrência') }}</x-admin.sidebar.item>
                </x-admin.sidebar.group>
            @endif

            @if((auth()->user()->hasRole('supervision') || auth()->user()->hasRole('superadmin')) && is_array(Session::get('selectedRole')) &&
                in_array(Session::get('selectedRole')[0], ['supervision', 'superadmin']))

                <x-admin.sidebar.group title="{{ __('Supervisão') }}" icon="">
                    <x-admin.sidebar.item icon="" router="battalions.occurrences" wire:navigate>{{ __('Verificar Batalhões') }}</x-admin.sidebar.item>
                    <x-admin.sidebar.item icon="" router="search.occurrences" wire:navigate>{{ __('Verificar Ocorrências') }}</x-admin.sidebar.item>
                </x-admin.sidebar.group>
            @endif


            @if((auth()->user()->hasRole('manager') || auth()->user()->hasRole('superadmin')) && is_array(Session::get('selectedRole')) &&
                in_array(Session::get('selectedRole')[0], ['certificates', 'superadmin']))

                <x-admin.sidebar..group title="{{ __('STQ') }}" icon="">
                    <x-admin.sidebar.item icon="" router="manager.battalions" wire:navigate>{{ __('Gerenciar BPM/M') }}</x-admin.sidebar.item>
                    <x-admin.sidebar.item icon="" router="manager.natures" wire:navigate>{{ __('Gerenciar Naturezas') }}</x-admin.sidebar.item>
                    <x-admin.sidebar.item icon="" router="manager.trees" wire:navigate>{{ __('Gerenciar Árvores') }}</x-admin.sidebar.item>
                </x-admin.sidebar..group>
            @endif


            @if((auth()->user()->hasRole('certificates') || auth()->user()->hasRole('superadmin')) && is_array(Session::get('selectedRole')) && in_array(Session::get('selectedRole')[0], ['certificates', 'superadmin']))

                <x-admin.sidebar.group title="{{ __('Certidões') }}" icon="">
                    <x-admin.sidebar.item icon="" router="certificates.view" wire:navigate>{{ __('Verificar Ocorrências') }}</x-admin.sidebar.item>
                    <x-admin.sidebar.item icon="" router="certificates.delete" wire:navigate>{{ __('Deletar Ocorrências') }}</x-admin.sidebar.item>
                </x-admin.sidebar.group>
            @endif



            @if((auth()->user()->hasRole('technique') || auth()->user()->hasRole('superadmin')) && is_array(Session::get('selectedRole')) && in_array(Session::get('selectedRole')[0], ['technique', 'superadmin']))
                <x-admin.sidebar.group title="{{ __('Técnica') }}" icon="">
                    <x-admin.sidebar.item icon="" router="technique.users" wire:navigate>{{ __('Gerenciar Usuários') }}</x-admin.sidebar.item>
                </x-admin.sidebar.group>
            @endif

            @if (empty(Session::get('selectedRole')))  <x-admin.sidebar.group title="{{ __('Perfil') }}" icon="">
                <x-admin.sidebar.item icon="" router="config.role" wire:navigate>{{ __('Escolher Perfil') }}</x-admin.sidebar.item>
            </x-admin.sidebar.group>
            @endif



        </ul>
    </div>
</aside>
