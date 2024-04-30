<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-bordered"
    data-assets-path="{{ asset('assets') }}/"
    data-template="horizontal-menu-template-starter"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>

    @include('components.layouts.includes.styles')

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}"/>

    @livewireStyles
</head>

<body>
<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            {{ $slot }}
        </div>
    </div>
</div>

@livewireScripts
@include('components.layouts.includes.scripts')
</body>
</html>
