<div>
    <div class="bg-white mb-10 py-6 sm:py-8 lg:py-12 shadow-xl rounded-lg bg-slate-100/20">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            {{$images->links()}}
            <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($images as $image)
                    <div class="flex-col">
                        <div class="relative group overflow-hidden rounded-lg w-[80%] h-[80%] mx-auto">
                            <img src="{{ asset($image->path) }}" alt="{{$image->description}}}}"
                                 class="w-full h-full object-cover object-center transition duration-300 transform hover:scale-110">
                        </div>
                        <div class="mt-3 justify-center"
{{--            WAAR KEY???                 wire:key="image_{{$image->id}}"--}}
                        >
                            <x-button>Aanpassen</x-button>
                            <x-button bgcolor="rood"
{{--                                      wire:click="deleteImage({{$image->id}})"--}}
                                      x-data=""
                                      @click="confirm('Weet je zeker dat je deze foto wilt verwijderen?') ? $wire.deleteImage({{$image->id}}) : ''"
                            >Verwijderen</x-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>