<div class="text-black">
    <div class="bg-white mb-10 py-6 sm:py-8 lg:py-12 shadow-xl rounded-lg bg-slate-100/20">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex justify-between">
{{--                Filter op afbeeldingstype --}}
                <div>
                    <label for="type" value="type"/>
                    <select id="type" wire:model="type">
                        @foreach($imagetypes as $it)
                            <option value="{{ $it->id }}">{{ $it->image_type }}</option>
                        @endforeach
                            <option value="%">Overige</option>
                    </select>
                </div>
{{--                Filter rit      --}}
{{--                Waarde aan tour wordt doorgegeven, maar de query wordt niet in rekening genomen?--}}
                @if($type == 1)
                <div>
                    <label for="tour" value="tour"/>
                    <select id="tour" wire:model="tour">
                        <option value="%">Alle ritten</option>
                        @foreach($tours as $t)
                            <option value="{{ $t->id }}">{{ $t->tour_name }}</option>
                        @endforeach
                    </select>
                </div>
{{--                Filter: Weergeven op carousel in homepage of niet?      --}}
                <div>
                    <label for="homecarousel" value="homecarousel">Getoond op homepage?</label>
                    <x-checkbox id="homecarousel" type="checkbox"
                                wire:model="homecarousel"
                                autocomplete="off" class="block mt-1"/>
                </div>
                @endif
                <div>{{$images->links()}}</div>
            </div>
{{--            Tonen van alle foto's       --}}
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($images as $image)
                    <div class="flex-col mb-3"
                    wire:key="image_{{$image->id}}"
                    >
{{--                        Overzicht van info per foto             --}}
                        <div class="flex justify-between mb-2">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{$image->name}}</h3>
                                <p class="text-sm text-gray-500">{{$image->description}}</p>
                                @if($image->in_carousel)
                                    <p class="font-bold">Wordt getoond op de homepagina</p>
                                @endif
                            </div>
                            <div>
                                @foreach($tours as $tour)
                                    @if($image->tour_id == $tour->id)
                                        <p class="text-sm text-gray-500">Tour: '{{$tour->tour_name}}'</p>
                                    @endif
                                @endforeach
                                @if($image->image_type_id != null)
                                    <p class="text-sm text-gray-500">Type: {{$image->image_type_name}}</p>
                                @endif
                            </div>
                        </div>
{{--                        Foto + beschrijving         --}}
                        <div class="relative group overflow-hidden rounded-lg w-[80%] h-[80%] mx-auto">
                            <img src="{{ asset($image->path) }}" alt="{{$image->description}}"
                                 class="w-full h-full object-cover object-center transition duration-300 transform hover:scale-110">
                        </div>
{{--                        Id doorgeven aan de modal om te kunnen aanpassen               --}}
                        <div class="mt-3 flex justify-center">
                            <x-button
                            wire:click="editImage('{{$image->id}}')"
                            >Aanpassen</x-button>
{{--                        Image verwijderen                   --}}
                            <x-button bgcolor="rood"
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
                                    >Verwijderen</x-button>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
{{--            Uploadzone          --}}
    <div class="flex justify-center">
        {{--        Welk afbeeldingstype hoort bij de foto's?       --}}
        <div class="mr-4">
            <label for="uploadType" value="uploadType">Afbeeldingstype: </label>
            <select id="uploadType" wire:model="uploadType">
                @foreach($imagetypes as $itype)
                    <option value="{{ $itype->id }}">{{ $itype->image_type }}</option>
                @endforeach
                <option value="">Overige</option>
            </select>
        </div>
{{--        Aan welke tour wil je images linken?        --}}
        @if($uploadType == 1)
        <div class="mr-4">
            <label for="uploadTour" value="uploadTour">Voor welke tour wil je een afbeelding uploaden? </label>
            <select id="uploadTour" wire:model="uploadTour">
                @foreach($tours as $to)
                    <option value="{{ $to->id }}">{{ $to->tour_name }}</option>
                @endforeach
            </select>
        </div>
        @endif
{{--        Opslaan en errors       --}}
                    <form wire:submit.prevent="saveImage">
{{--                        Multiple om aan te duiden dat je meerdere afbeeldingen tegelijkertijd kan uploaden--}}
                <input type="file" wire:model="photos" multiple>
                @if($errors->any())
                    <div class="mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <x-button type="submit">Save Images</x-button>
            </form>
    </div>
    @include('components.wd_components.modalfotobeheer')
</div>



