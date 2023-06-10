<x-templatelayout>
    <x-slot name="title">Vraag je paswoord aan</x-slot>
    <x-slot name="description">Op deze pagina kan u als een paswoord aanvragen beheren.</x-slot>

    <x-authentication-card>


        <x-slot name="logo">
            <img src="{{ asset('assets/logo/Logo WZD.png') }}" class="mt-2 h-[50%] w-[50%]" />
        </x-slot>

        <div class="mb-4 text-gray-600">
            {{ __('Ben je je wachtwoord vergeten? Geen probleem. Laat ons gewoon je e-mailadres weten en we sturen je een wachtwoordherstel-link per e-mail, waarmee je een nieuw wachtwoord kunt kiezen.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}"
              class="mb-2">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Vraag nieuw wachtwoord') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-templatelayout>
