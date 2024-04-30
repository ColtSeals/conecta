<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @if (session('status'))
            <div class="alert alert-success mb-3 rounded" role="alert">
                <div class="alert-body">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <form class="mb-3" method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf

            <div class="form-floating form-floating-outline mb-3">
                <x-input id="license" type="text" name="license" :value="old('license')" placeholder="Matricula" required />
                <x-label for="license" value="{{ __('Matricula') }}" />
                <x-input-error for="license" />
            </div>

            <div class="mb-3">
                <div class="form-password-toggle">
                    <div class="input-group input-group-merge @error('password') is-invalid @enderror">
                        <div class="form-floating form-floating-outline">
                            <x-input id="password"
                                     class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                     placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                     type="password" name="password"
                                     required autocomplete="off"
                            />

                            <x-label for="password" value="{{ __('Senha') }}" />
                        </div>

                        <span class="input-group-text cursor-pointer">
                            <i class="mdi mdi-eye-off-outline"></i>
                        </span>
                    </div>

                    <x-input-error for="password" />
                </div>
            </div>

            <x-secondary-button type="submit" class="d-grid w-100">
                {{ __('Log in') }}
            </x-secondary-button>
        </form>
    </x-authentication-card>
</x-guest-layout>
