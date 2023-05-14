<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profiel informatie') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update je profiel.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Foto') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecteer een nieuwe foto') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Verwijder foto') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Naam') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Birthday -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="birthdate" value="{{ __('Geboortedatum (jjjj-mm-dd)') }}" />
            <x-input id="birthdate" type="text" class="mt-1 block w-full" wire:model.defer="state.birthdate" autocomplete="birthdate" />
            <x-input-error for="birthdate" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="username" value="{{ __('Username') }}" />
            <x-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username" autocomplete="username" />
            <x-input-error for="username" class="mt-2" />
        </div>


        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" autocomplete="email" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- Addres -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Adres') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <!--postal_code -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="postal_code" value="{{ __('Postcode') }}" />
            <x-input id="postal_code" type="text" class="mt-1 block w-full" wire:model.defer="state.postal_code" autocomplete="postal_code" />
            <x-input-error for="postal_code" class="mt-2" />
        </div>

        <!--city -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('Stad') }}" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" autocomplete="city" />
            <x-input-error for="city" class="mt-2" />
        </div>

        <!--phone_number -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="phone_number" value="{{ __('Telefoon nummer') }}" />
            <x-input id="phone_number" type="text" class="mt-1 block w-full" wire:model.defer="state.phone_number" autocomplete="phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>

        <!--mobile_number -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="mobile_number" value="{{ __('Mobiel nummer') }}" />
            <x-input id="mobile_number" type="text" class="mt-1 block w-full" wire:model.defer="state.mobile_number" autocomplete="mobile_number" />
            <x-input-error for="mobile_number" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Opgeslagen') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Opslaan') }}
        </x-button>
    </x-slot>
</x-form-section>
