<div class="text-black">
    <div class="m-2">
        <div class="mx-auto max-w-screen-2xl">
            <div class="flex flex-col md:flex-row justify-evenly items-center">
                {{--                Filter op afbeeldingstype --}}
                <div class="flex flex-col text-gray-800">
                    <label for="type" class="mr-2 text-white text-center">Filter op type</label>
                    <select id="type" class="border border-gray-300 rounded-lg px-4 py-2" wire:model="type">
                        @foreach($imagetypes as $it)
                            <option value="{{ $it->id }}">{{ $it->image_type }}</option>
                        @endforeach
                        <option value="%">Overige</option>
                    </select>
                </div>
                {{--                Filter rit      --}}
                {{--                Waarde aan tour wordt doorgegeven, maar de query wordt niet in rekening genomen?--}}
                @if($type == 1)
                    <div class="flex flex-col text-gray-800">
                        <label for="tour" class="mr-2 text-white text-center">Filter op Route</label>
                        <select id="tour" class="border border-gray-300 rounded-lg px-4 py-2" wire:model="tour">
                            <option value="%">Alle ritten</option>
                            @foreach($tours as $t)
                                <option value="{{ $t->id }}">{{ $t->tour_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--                Filter: Weergeven op carousel in homepage of niet?      --}}
                    <div class="mb-2 flex flex-row lg:items-center">
                        <label class="mr-2 text-white" for="homecarousel" value="homecarousel">Getoond op
                            homepage?</label>
                        <x-checkbox id="homecarousel" type="checkbox"
                                    wire:model="homecarousel"
                                    autocomplete="off" class="block mt-1"/>
                    </div>
                @endif
                <div>{{$images->links()}}</div>
            </div>
            @if($images->isEmpty())
                <div class="bg-white my-5 mx-auto max-w-md shadow-2xl rounded-2xl">
                    <p class="text-center justify-center p-4">
                        Er kunnen geen foto's met deze criteria gevonden worden.
                        Mogelijk is er nog geen foto geüpload die hieraan voldoet.
                    </p>
                </div>
            @else
                {{--            Tonen van alle foto's       --}}
                <div
                    class="mt-4 flex flex-wrap justify-between">
                    @foreach($images as $image)
                        <div
                            class="flex mb-4 mx-auto sm:mx-0"
                            wire:key="image_{{$image->id}}">
                            <div
                                class="block max-w-[22rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                <img class="rounded-t-lg w-full" src="{{ asset($image->path) }}"
                                     alt="{{$image->description}}"
                                />
                                <div class="p-6">
                                    <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                        {{--                                        {{$traject->name}}--}}
                                        {{$image->name}}
                                    </h5>
                                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                        {{--                                        Afstand: {{round($traject->amount_of_km/1000,2)}}KM--}}
                                        {{$image->description}}
                                    </p>
                                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    {{--                                        Uploaded by: {{$traject->user->name}}--}}
                                    @foreach($tours as $tour)
                                        @if($image->tour_id == $tour->id)
                                            <p class="text-sm text-gray-500">Tour: {{$tour->tour_name}}</p>
                                        @endif
                                    @endforeach
                                    @if($image->in_carousel)
                                        <x-heroicon-m-home class="h-6 w-6 text-[#073360]"></x-heroicon-m-home>
                                    @endif
                                </div>
                                <div class="flex justify-between items-end">
                                    <x-button
                                        wire:click="editImage('{{$image->id}}')"
                                    >Aanpassen
                                    </x-button>
                                    {{--                                    Image verwijderen--}}
                                    <x-button type="red"
                                              x-data=""
                                              @click="$dispatch('swal:confirm', {
                                                                          html: 'Verwijder {{ $image->name }}?',
                                                                          confirmButtonText: 'Verwijder deze foto',
                                                                          next: {
                                                                          event: 'delete-image',
                                                                          params: {
                                                                          path: '{{ $image->path }}'
                                                                          }
                                                                          }
                                                                          })"
                                    >Verwijderen
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    {{--            Uploadzone          --}}
    <div class="m-2">
        <div class="mx-auto max-w-screen-2xl">
            <h3 class="text-white text-center">Upload hier je foto(s). Selecteer eerst een type, als je
                voor rit hebt gekozen selecteer
                dan het bijhorende traject, selecteer als laatste de bestanden die je wil uploaden.</h3>
            <div class="flex flex-col m-2 md:flex-row justify-between items-center">
                {{--        Welk afbeeldingstype hoort bij de foto's?       --}}
                <div class="flex flex-col text-gray-800">
                    <label class="mr-2 text-white text-center" for="uploadType">Type</label>
                    <select class="border border-gray-300 rounded-lg px-4 py-2" id="uploadType"
                            wire:model="uploadType">
                        @foreach($imagetypes as $itype)
                            <option value="{{ $itype->id }}">{{ $itype->image_type }}</option>
                        @endforeach
                        <option value="">Overige</option>
                    </select>
                </div>
                {{--        Aan welke tour wil je images linken?        --}}
                @if($uploadType == 1)
                    <div class="flex flex-col text-gray-800">
                        <label class="mr-2 text-white text-center" for="uploadTour">Traject</label>
                        <select class="border border-gray-300 rounded-lg px-4 py-2" id="uploadTour"
                                wire:model="uploadTour">
                            @foreach($tours as $to)
                                <option value="{{ $to->id }}">{{ $to->tour_name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                {{--        Opslaan en errors       --}}
                <form id="save" class="mt-2" wire:submit.prevent="saveImage">
                    {{--                        Multiple om aan te duiden dat je meerdere afbeeldingen tegelijkertijd kan uploaden--}}
                    <input class="text-white mb-2" type="file" wire:model="photos" multiple>
                    @if($errors->any())
                        <div class="mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-red-500">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <x-button class="mb-2" type="submit">Foto's opslaan</x-button>
                </form>
            </div>
        </div>
    </div>
    @include('components.wd_components.modalfotobeheer')
</div>



