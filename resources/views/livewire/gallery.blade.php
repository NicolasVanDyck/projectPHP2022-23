<div>
    <div class="p-4">
        <div class="mb-4 flex flex-col-reverse md:flex-row items-center justify-between">
            <div class="mt-4 flex items-center text-black">
                <label for="start-datepicker" class="block font-medium text-white mr-2">Zoek op datum: </label>
                <input type="date" id="start-datepicker" wire:model="date" class="form-control mt-1">
                @if($date != null)
                    <x-button wire:click="resetDate()" class="ml-2">Toon alle foto's</x-button>
                @endif
            </div>
            <div class="mt-4 md:mt-0">
                {{$grouptours->links()}}
            </div>
        </div>
        @foreach($grouptours as $gt)
            <div class="my-4">
                <p class="text-white">
                    Rit: {{$gt->tour->tour_name}} {{date('d/m/Y', strtotime($gt->start_date))}}</p>
            </div>
            <div class="container mx-auto px-5 py-2 lg:pt-12">
                <div class="-m-1 flex flex-wrap md:-m-2">
                    @foreach($gt->tour->images as $photo)
                        <div class="flex w-full md:w-1/3">
                            <div class="w-full p-1 md:p-2">
                                <img class="block h-full w-full rounded-lg object-cover object-center"
                                     src="{{ asset($photo->path) }}" alt="{{$photo->description}}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-4">
        <div class="my-4">
            <p class="text-black">Overige foto's:</p>
        </div>
        <div class="container mx-auto px-5 py-2 lg:px-32">
            <div class="-m-1 flex flex-wrap md:-m-2">
                @foreach($allPhotos as $p)
                    <div class="w-full md:w-1/3 p-2">
                        <img src="{{ asset($p->path) }}" alt="{{$p->description}}"
                             class="block h-full w-full rounded-lg object-cover object-center">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-4">
            {{$allPhotos->links()}}
        </div>
    </div>
</div>
