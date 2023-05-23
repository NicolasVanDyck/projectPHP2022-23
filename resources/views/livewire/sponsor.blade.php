<div class="px-8 bg-white rounded-3xl shadow-md">
    <h1 class="underline text-center">Onze sponsors</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-8">
{{--        @foreach(Storage::files('public/sponsor/') as $path)--}}
{{--            <div class="relative bg-white border rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transform transition duration-500 hover:scale-105">--}}
{{--                <div class="p-2 flex justify-center">--}}
{{--                    <img class="rounded-md h-48 w-full object-fit" src="{{ asset(Storage::url($path)) }}" alt="image">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
            @foreach($images as $image)
                <div class="relative bg-white border rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transform transition duration-500 hover:scale-105">
                    <div class="p-2 flex justify-center">
                        <img class="rounded-md h-48 w-full object-fit" src="{{ asset($image->path) }}" alt="{{$image->description}}">
                    </div>
                </div>
            @endforeach
    </div>
</div>
