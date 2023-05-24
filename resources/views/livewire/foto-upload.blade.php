<div>
    <div class="bg-white mb-10 py-6 sm:py-8 lg:py-12 shadow-xl rounded-lg bg-slate-100/20">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex justify-between">
                <div>
                    <label for="type" value="type"/>
                    <select id="type" wire:model="type">
                        <option value="%">Kies hier je afbeeldingstype</option>
                        @foreach($imagetypes as $it)
                            <option value="{{ $it->id }}">{{ $it->image_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div>{{$images->links()}}</div>
{{--                Extra filter op attribuut 'carousel'?           --}}
            </div>
            <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($images as $image)
                    <div class="flex-col mb-3"
                    wire:key="image-{{$image->id}}"
                    >
                        <div class="flex justify-between mb-2">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{$image->name}}</h3>
                                <p class="text-sm text-gray-500">{{$image->description}}</p>
                            </div>
                            <div>
{{--                                Tour_id = nu overal null--}}
                                <p class="text-lg font-medium text-gray-900">{{$image->tour_id}}</p>
                                <p class="text-sm text-gray-500">{{$image->image_type_name}}</p>
                            </div>
                        </div>
                        <div class="relative group overflow-hidden rounded-lg w-[80%] h-[80%] mx-auto">
                            <img src="{{ asset($image->path) }}" alt="{{$image->description}}}}"
                                 class="w-full h-full object-cover object-center transition duration-300 transform hover:scale-110">
                        </div>
                        <div class="mt-3 flex justify-center">
                            <x-button
                            wire:click="setNewImage({{$image->id}})"
                            >Aanpassen</x-button>
                            <x-button bgcolor="rood"
                                      wire:click="deleteImage({{$image->id}})"
                                      x-data=""
                                      @click="confirm('Weet je zeker dat je deze foto wilt verwijderen?') ? $wire.deleteImage({{$image->id}}) : ''"
                            >Verwijderen</x-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('components.wd_components.modalfotobeheer')
</div>



