<div>
    <div class="flex justify-between flex-wrap">
        <div class="flex flex-col text-gray-800">
            {{-- Filter op gebruiker --}}
            <h3 class="flex">Filter op leden</h3>
            <div class="flex">
                <label for="user" value="user"/>
                <select id="user" wire:model="user">
                    <option value="%">Alle Leden</option>
                    @foreach($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Filter op afstand --}}
        <div class="flex flex-col text-gray-800">
            <h3 class="flex sm:mx-auto">Filter op afstand:</h3>
            <div class="p-2 flex">
                <label for="afstand">Aantal kilometers:
                    <output id="kilometerfilter" name="kilometerfilter">{{round($afstand/1000)}}</output>
                </label>
                <input type="range" class="accent-orange-500" id="afstand" name="afstand" wire:model="afstand"
                       min="{{$afstandMin}}"
                       max="{{$afstandMax}}" value="0" step="5"
                       x-bind:value="afstand" x-on:input="kilometerfilter.value = $event.target.value">
            </div>
        </div>

        {{-- Aantal ritten per pagina --}}
        <div class="flex flex-col text-gray-800">
            <h3 class="flex">Per Page</h3>
            <div class="flex">
                <label for="perPage" value="perPage"/>
                <select id="perPage" wire:model="perPage">
                    <option value="1">1</option>
                    <option value="3">3</option>
                    <option value="6">6</option>
                    <option value="9">9</option>
                </select>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $trajecten->links() }}
    </div>

    <!-- Grid of trajects -->
    <div class="flex flex-wrap justify-center">
        @foreach($trajecten as $traject)
            <div class="p-4">
                <div
                    class="block max-w-[22rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <a href="#!">
                        <img class="rounded-t-lg w-full" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg"
                             alt=""/>
                    </a>
                    <div class="p-6">
                        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                            {{$traject->name}}
                        </h5>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            Afstand: {{round($traject->amount_of_km/1000,2)}}KM
                        </p>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            Uploaded by: {{$traject->user->name}}
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <x-button wire:click="download('{{$traject->path}}')">Download</x-button>
                        @if($traject->user->id == auth()->user()->id || auth()->user()->is_admin)
                            <x-button type="red"
                                      x-data=""
                                      @click="confirm('Ben je zeker dat je dit traject wilt verwijderen?') ? $wire.delete('{{$traject->path}}') : false"
                            >Delete
                            </x-button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
