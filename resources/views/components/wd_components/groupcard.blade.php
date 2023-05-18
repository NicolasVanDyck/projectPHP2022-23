<div class="p-4" >
    <div
        class="block max-w-[22rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
        <a href="#!">
            <img
                class="rounded-t-lg w-full"
                src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg"
                alt=""/>
        </a>
        <div class="p-6">
            <h2 class="font-semibold underline decoration-indigo-500 mb-2">
                {{$card_route_name}}
            </h2>
            <p class="leading-relaxed text-lg mb-2">
                Start Datum: {{$card_Startdate}}
            </p>
            <p class="leading-relaxed text-lg mb-2">
                Eind Datum: {{$card_Enddate}}
            </p>
            <p class="leading-relaxed text-lg mb-2">
                Hoeveel Km: {{$card_distance}}
            </p>
            <div class="mt-4">
                <button class="inline-block w-full font-bold rounded bg-info px-6 text-center pb-2 pt-2.5 text-lg uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" wire:click="joinTour({{ $groupTour->id }})">Join Tour</button>
            </div>
        </div>
    </div>
</div>

