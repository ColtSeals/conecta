<div>
    <x-slot name="header">
        <span>
            <span class="mdi mdi-phone-log-outline fs-3"></span>
            {{ __('⚡️SEJA BEM VINDO AO ') }} {{ config('app.name') }}!
        </span>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <img src="{{ asset('assets/img/branding/conecta-logo.png') }}" alt="siopmoff" class="img-fluid" style="max-width: 60%;">
            </div>
        </div>
    </div>
</div>
