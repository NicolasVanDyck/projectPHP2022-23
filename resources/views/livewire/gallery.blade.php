<div>
    <div class="p-4 bg-[#F5F5F5]">
        <div class="mb-4 flex items-center justify-between">
            <div class="mt-4 flex items-center text-black">
                <label for="start-datepicker" class="block font-medium text-gray-700">Zoek op datum: </label>
                <input type="date" id="start-datepicker" wire:model="date" class="form-control mt-1">
                @if($date != null)
                    <x-button wire:click="resetDate()" class="ml-2">Toon alle foto's</x-button>
                @endif
            </div>
            <div>
                {{$grouptours->links()}}
            </div>
        </div>
        @foreach($grouptours as $gt)
            <div class="my-4">
                <p class="text-black">
                    Rit: {{$gt->tour->tour_name}} {{date('d/m/Y', strtotime($gt->start_date))}}</p>
            </div>
            <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                <div class="-m-1 flex flex-wrap md:-m-2">
                    @foreach($gt->tour->images as $photo)
                        <div class="flex w-1/3 flex-wrap">
                            <div class="w-full p-1 md:p-2">
                                <img
                                    class="block h-full w-full rounded-lg object-cover object-center"
                                    src="{{ asset($photo->path) }}" alt="{{$photo->description}}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-4 bg-[#F5F5F5]">
        <div>
            {{$photos->links()}}
        </div>
        <div class="my-4">
            <p class="text-black">Overige foto's:</p>
        </div>
        <div class="flex flex-wrap">
            @foreach($photos as $p)
                <img src="{{ asset($p->path) }}" alt="{{$p->description}}"
                     class="xs:w-[100%] sm:w-[50%] lg:w-[25%] h-[400px] object-cover object-center transition duration-300 transform hover:scale-110">
            @endforeach
        </div>
    </div>
</div>
