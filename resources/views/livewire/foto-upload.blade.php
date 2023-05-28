<div>
    <div class="bg-white mb-10 py-6 sm:py-8 lg:py-12 shadow-xl rounded-lg bg-slate-100/20">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex justify-between">
                <div>
                    <label for="type" value="type"/>
                    <select id="type" wire:model="type">

                        <option value="%">Alle afbeeldingen</option>
                        @foreach($imagetypes as $it)
                            <option value="{{ $it->id }}">{{ $it->image_type }}</option>
                        @endforeach
                    </select>
                </div>
{{--                Waarde aan tour wordt doorgegeven, maar de query wordt niet in rekening genomen?    --}}
{{--                <div>--}}
{{--                    <label for="tour" value="tour"/>--}}
{{--                    <select id="tour" wire:model="tour">--}}
{{--                        <option value="%">Alle afbeeldingen</option>--}}
{{--                        @foreach($tours as $t)--}}
{{--                            <option value="{{ $t->id }}">{{ $t->tour_name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div>
                    <label for="homecarousel" value="homecarousel">Getoond op homepage?</label>
                    <x-checkbox id="homecarousel" type="checkbox"
                                wire:model="homecarousel"
                                autocomplete="off" class="block mt-1"/>

                </div>
                <div>{{$images->links()}}</div>
{{--                Extra filter op attribuut 'carousel'?           --}}
            </div>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($images as $image)
                    <div class="flex-col mb-3"
                    wire:key="image_{{$image->id}}"
                    >
                        <div class="flex justify-between mb-2">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{$image->name}}</h3>
                                <p class="text-sm text-gray-500">{{$image->description}}</p>
                                @if($image->in_carousel)
                                    <p class="font-bold">Wordt getoond op de homepagina</p>
                                @endif
                            </div>
{{--                            Zicht in beeld als tour_id opstaat?? --}}
                            <div>
                                @foreach($tours as $tour)
                                    @if($image->tour_id == $tour->id)
                                        <p class="text-sm text-gray-500">Tour: '{{$tour->tour_name}}'</p>
                                    @endif
                                @endforeach
                                <p class="text-sm text-gray-500">Type: {{$image->image_type_name}}</p>
                            </div>
                        </div>
                        <div class="relative group overflow-hidden rounded-lg w-[80%] h-[80%] mx-auto">
                            <img src="{{ asset($image->path) }}" alt="{{$image->description}}"
                                 class="w-full h-full object-cover object-center transition duration-300 transform hover:scale-110">
                        </div>
                        <div class="mt-3 flex justify-center">
                            <x-button
                            wire:click="setNewImage('{{$image->id}}')"
                            >Aanpassen</x-button>
                            <x-button bgcolor="rood"
                                      x-data=""
                                      @click="confirm('Weet je zeker dat je deze foto wilt verwijderen?') ? $wire.deleteImage('{{$image->path}}') : ''"
                            >Verwijderen</x-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="mr-4">
            <label for="uploadTour" value="uploadTour">Voor welke tour wil je een afbeelding uploaden? </label>
            <select id="uploadTour" wire:model="uploadTour">
                <option value="0">Geen tour</option>
                @foreach($tours as $to)
                    <option value="{{ $to->id }}">{{ $to->tour_name }}</option>
                @endforeach
            </select>
        </div>
            <div class="mr-4">
                <label for="uploadType" value="uploadType">Afbeeldingstype: </label>
                <select id="uploadType" wire:model="uploadType">
                    @foreach($imagetypes as $itype)
                        <option value="{{ $itype->id }}">{{ $itype->image_type }}</option>
                    @endforeach
                </select>
            </div>
                    <form wire:submit.prevent="saveImage">
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
{{--    @include('components.wd_components.modalimageupload')--}}
    @include('components.wd_components.modalfotobeheer')
</div>



