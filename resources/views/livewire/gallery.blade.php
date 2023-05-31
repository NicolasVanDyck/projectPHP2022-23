<div>
{{--    <div class="py-6 sm:py-8 lg:py-12 bg-[#F5F5F5]">--}}
{{--        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">--}}

{{--                @foreach($images as $image)--}}
{{--                    <div class="relative group overflow-hidden rounded-lg">--}}
{{--                        <img src="{{ $image }}" alt="" class="w-full h-full object-cover object-center transition duration-300 transform hover:scale-110">--}}
{{--                    </div>--}}
{{--                @endforeach--}}
    <div class="p-4 bg-[#F5F5F5]">
        @foreach($grouptours as $gt)
            <div class="my-4">
                <p class="text-black">Rit: {{$gt->tour->tour_name}} {{date('d/m/Y', strtotime($gt->start_date))}}</p>
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
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div class="p-4 bg-[#F5F5F5]">
        <div class="my-4">
            <p class="text-black">Overige foto's:</p>
        </div>
        <div class="flex flex-wrap">
    @foreach($photos as $p)
        @if($p->tour_id == null && $p->image_type_id == 2)

                <img src="{{ asset($p->path) }}" alt="{{$p->description}}"
                     class="xs:w-[100%] sm:w-[50%] lg:w-[25%] h-[400px] object-cover object-center transition duration-300 transform hover:scale-110">

        @endif
        @endforeach
    </div>
    </div>
</div>
