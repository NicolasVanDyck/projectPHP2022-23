<div>
    {{--        Filter op gebruiker          --}}
    <div>
        <h3>Filter op leden</h3>
        <label for="user" value="user"/>
        <select id="user" wire:model="user">
            <option value="%">Alle Leden</option>
            @foreach($users as $user)
                <option value="{{ $user->name }}">{{ $user->name}} </option>
            @endforeach
        </select>
    </div>
    {{--        Filter op afstand         --}}
    <div>
        <h3>Filter op afstand:</h3>
        <div class="p-2">
            <label for="afstand">Aantal kilometers:
                <output id="kilometerfilter" name="kilometerfilter">{{$afstand}}</output>
            </label>
            <input type="range" id="afstand" name="afstand" wire:model="afstand" min="{{$afstandMin}}"
                   max="{{$afstandMax}}" value="0" step="5"
                   oninput="kilometerfilter.value = afstand.value">
        </div>
    </div>
    @foreach($trajecten as $traject)
        <div class="p-4">
            <div
                class="block max-w-[22rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <a href="#!">
                    <img
                        class="rounded-t-lg w-full"
                        src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg"
                        alt=""/>
                </a>
                <div class="p-6">
                    <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                        {{$traject->name}}
                    </h5>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Afstand: {{round($traject->amount_of_km/1000,2)}}KM
                    </p>
                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        Uploaded by: {{$traject->user->name}}
                    </p>
                </div>
                <x-button wire:click="download('{{$traject->path}}')">DOWNLOAD</x-button>
                @if($traject->user->id == auth()->user()->id || auth()->user()->is_admin)
                    <x-button class="bg-danger"
                              x-data=""
                              @click="confirm('Are you sure you want to delete this item?') ? $wire.delete('{{$traject->path}}') : false"
                    >DELETE
                    </x-button>
                @endif
            </div>
        </div>
    @endforeach
</div>
