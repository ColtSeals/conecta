<x-app-layout>
    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        <div class="mb-4">
            @livewire('profile.update-profile-information-form')
        </div>
    @endif

    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        <div class="mb-4">
            @livewire('profile.update-password-form')
        </div>
    @endif

    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <div class="mb-4">
            @livewire('profile.two-factor-authentication-form')
        </div>
    @endif

    <div class="mb-4">
        @livewire('profile.logout-other-browser-sessions-form')
    </div>
</x-app-layout>
