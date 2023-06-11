<div>
    <div class="p-5 text-center font-semibold border-b border-gray-100">Aanwezige ritten</div>
    <div>
        <div class="flex justify-around">
            @foreach($userAanwezigheden as $userAanwezigheid)
                <div class="flex flex-col">
                    <p>Vertrek om:</p>
                    <p>{{$userAanwezigheid->start_date}}</p>
                    <p>{{$userAanwezigheid->start_time}}</p>
                    <p>{{\App\Models\GPX::find($userAanwezigheid->g_p_x_id)->name}}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center my-5">
        <x-button
            type="button" onclick="window.location.href='{{ route('deelname_groep') }}'"
            class="rounded border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
            data-te-ripple-init>
            Wijzigen
        </x-button>
    </div>
    <div>
        {{ $userAanwezigheden->links() }}
    </div>
</div>
