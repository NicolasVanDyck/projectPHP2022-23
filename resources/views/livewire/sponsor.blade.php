<div class="px-8 bg-white rounded-3xl shadow-md">
    <h3 class="font-bold underline text-center pt-2 text-lg">Onze sponsoren</h3>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 pb-4 h">
        @foreach(Storage::files('public/sponsor/') as $path)
            <div class="relative bg-white border rounded-lg shadow-md transform transition duration-500 hover:scale-105">
                <div class="p-2 flex justify-center ">
                    <img class="rounded-md object-fit" src="{{ asset(Storage::url($path)) }}" alt="image">
                </div>
            </div>
        @endforeach
    </div>
</div>
