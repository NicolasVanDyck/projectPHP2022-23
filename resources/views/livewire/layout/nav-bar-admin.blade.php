<div class="container mx-auto p-4 flex justify-between">
    <div class="flex items-center space-x-2 transition hover:scale-105 duration-1000">
        {{-- Logo --}}
            {{--            <img src="{{asset('icons/favicon-32x32.png')}}" alt="Logo" />--}}
        <h1>De Wezeldrivers</h1>
    </div>
    @auth
        <x-nav-link href="{{ route('aanwezighedenbeheer') }}" :active="request()->routeIs('aanwezighedenbeheer')">
            Aanwezighedenbeheer
        </x-nav-link>
        <x-nav-link href="{{ route('fotobeheer') }}" :active="request()->routeIs('fotobeheer')">
            Fotobeheer
        </x-nav-link>
        <x-nav-link href="{{ route('galerijbeheer') }}" :active="request()->routeIs('galerijbeheer')">
            Galerijbeheer
        </x-nav-link>
        <x-nav-link href="{{ route('kleding_bestellingen') }}" :active="request()->routeIs('kleding_bestellingen')">
            Kleding bestellingen
        </x-nav-link>
        <x-nav-link href="{{ route('kledingbeheer') }}" :active="request()->routeIs('kledingbeheer')">
            Kledingbeheer
        </x-nav-link>
        <x-nav-link href="{{ route('ledenbeheer') }}" :active="request()->routeIs('ledenbeheer')">
            Ledenbeheer
        </x-nav-link>
        <x-nav-link href="{{ route('trajectbeheer') }}" :active="request()->routeIs('trajectbeheer')">
            Trajectbeheer
        </x-nav-link>
        <x-nav-link href="{{ route('webtekstbeheer') }}" :active="request()->routeIs('webtekstbeheer')">
            Webtekstbeheer
        </x-nav-link>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Logout</button>
        </form>
    @endauth
</div>
