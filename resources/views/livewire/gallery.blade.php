<div>
    <div class="p-4 bg-[#F5F5F5]">
        <div class="mb-4 flex items-center justify-between">
            <div class="mt-4 flex items-center text-black">
                <label for="start-datepicker" class="block font-medium text-gray-700">Zoek op datum: </label>
                <input type="date" id="start-datepicker" wire:model="date" class="form-control mt-1">
                @if($date != null)
                    <x-button wire:click="resetDate()">Toon alle foto's</x-button>
                @endif
            </div>
        </div>
        <div>
            {{$grouptours->links()}}
        </div>
            @foreach($grouptours as $gt)
                <div class="my-4">
                    <p class="text-black">
                        Rit: {{$gt->tour->tour_name}} {{date('d/m/Y', strtotime($gt->start_date))}}</p>
                </div>
                <div class="flex flex-wrap">
                    @foreach($photos as $photo)
                        @if($gt->tour->id == $photo->tour_id)
                            <img src="{{ asset($photo->path) }}" alt="{{$photo->description}}"
                                 class="xs:w-[100%] sm:w-[50%] lg:w-[25%] h-[400px] object-cover object-center transition duration-300 transform hover:scale-110">
                        @endif
                    @endforeach
                </div>
          @endforeach
    </div>
    <div class="p-4 bg-[#F5F5F5]">
        <div>
            {{$overigephotos->links()}}
        </div>
        <div class="my-4">
            <p class="text-black">Overige foto's:</p>
        </div>
        <div class="flex flex-wrap">

                @foreach($overigephotos as $p)
                        <img src="{{ asset($p->path) }}" alt="{{$p->description}}"
                             class="xs:w-[100%] sm:w-[50%] lg:w-[25%] h-[400px] object-cover object-center transition duration-300 transform hover:scale-110">
                @endforeach
        </div>
    </div>
</div>
