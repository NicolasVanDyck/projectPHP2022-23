<x-templatelayout>
    <x-slot name="title">Stel je wachtwoord in</x-slot>
    <x-slot name="description">Op deze pagina kan u een nieuw wachtwoord instellen.</x-slot>

    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('assets/logo/Logo WZD.png') }}" class="mt-2 h-[50%] w-[50%]" />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('E-mail') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Wachtwoord') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Bevestig Wachtwoord') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Stel nieuw wachtwoord in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-templatelayout>
