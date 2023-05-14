<div>
    <div class="bg-white mb-10 py-6 sm:py-8 lg:py-12 shadow-xl rounded-lg bg-slate-100/20">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($images as $image)
                    <div class="relative group overflow-hidden rounded-lg">
                        <img src="{{ $image }}" alt="" class="w-full h-full object-cover object-center transition duration-300 transform hover:scale-110">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
