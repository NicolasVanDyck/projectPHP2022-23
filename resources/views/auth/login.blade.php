<x-templatelayout>

    <x-slot name="title">Login</x-slot>
    <x-slot name="description">Loginpagina van de Wezeldrivers</x-slot>

    <div class="bg-hero-pattern bg-cover bg-center bg-no-repeat h-screen">
        <div class="h-screen pt-20 md:w-1/2">
            <x-authentication-card>
                <x-slot name="logo">
                    <div class="mt-4">
                        <x-authentication-card-logo/>
                    </div>
                </x-slot>

                <x-validation-errors class="mb-4"/>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('E-mail') }}"/>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                 placeholder="wezeldrivers@hotmail.com" required autofocus autocomplete="username"/>
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Wachtwoord') }}"/>
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                 autocomplete="current-password"/>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember"/>
                            <span class="ml-2 text-sm text-gray-600">{{ __('Onthou mij') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                               href="{{ route('password.request') }}">
                                {{ __('Wachtwoord vergeten?') }}
                            </a>
                        @endif

                        <x-button class="ml-4">
                            {{ __('Aanmelden') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-templatelayout>
