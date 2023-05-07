<x-action-section>
    <x-slot name="title">
        {{ __('Verwijder account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Verwijder je account definitief.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Eenmaal je account verwijderd is, gaat ook alle data permanent verloren. Zorg ervoor dat je alle belangrijke data downloadt voordat je hiermee verdergaat.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Verwijderen') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Verwijder account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Ben je zeker dat je dit account wilt verwijderen? Eenmaal je account verwijderd is, ben je ook alle data permanent kwijt. Geef je wachtwoord in om verder te gaan') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Wachtwoord') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Stop') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Verwijder account') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
