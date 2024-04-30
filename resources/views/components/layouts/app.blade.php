<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="layout-wide light-style layout-footer-fixed layout-navbar-fixed customizer-hide"
    dir="ltr"
    data-theme="theme-bordered"
    data-assets-path="{{ asset('assets') }}/"
    data-template="horizontal-menu-template-starter"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>

    @include('components.layouts.includes.styles')
    @livewireStyles
</head>

<body>
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">
        @include('components.admin.navbar')

        <div class="layout-page">
            <div class="content-wrapper">
                @livewire('navigation-menu')

                <div class="flex-grow-1 container-p-y container-fluid">
                    {{ $slot }}
                </div>

                @include('components.admin.footer')

                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
</div>

@vite('resources/js/app.js')
<div class="layout-overlay layout-menu-toggle"></div>
<div class="drag-target"></div>

@livewire('components.modal')

@livewireScripts

@vite('resources/js/app.js')
@include('components.layouts.includes.scripts')
</body>
</html>
