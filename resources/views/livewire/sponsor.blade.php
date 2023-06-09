<div>
    <div class="flex flex-wrap justify-center">
        @foreach($images as $image)
            <div
                class="flex transform transition duration-500 hover:scale-105 bg-[#f5f5f5]">
                <div class="p-2 flex flex-wrap h-full">
                    <img class="object-contain mix-blend-multiply max-w-[100px] h-[70px]"
                         src="{{ asset($image->path) }}"
                         alt="{{ $image->description }}">
                </div>
            </div>
        @endforeach
    </div>
</div>
