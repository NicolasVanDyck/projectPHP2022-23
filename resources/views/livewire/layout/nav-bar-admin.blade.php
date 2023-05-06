<div class="container mx-auto p-4 flex justify-between">
    <div class="flex items-center mr-8 transition hover:scale-105 duration-1000">
        {{-- Logo --}}
            {{--            <img src="{{asset('icons/favicon-32x32.png')}}" alt="Logo" />--}}
        <h1>De Wezeldrivers</h1>
    </div>
    @auth
        <div class="flex w-full justify-between flex-grow">
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
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-nav-link>
            <x-nav-link class="mr-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                        Logout
                    </button>
                </form>
            </x-nav-link>
        </div>
        <x-dropdown align="right" width="48">
            avatar
            <x-slot name="trigger">
                <img class="rounded-full h-8 w-8 cursor-pointer"
                     src="{{ $avatar }}"
                     alt="{{ auth()->user()->name }}">
            </x-slot>
            <x-slot name="content">
                <div class="block px-4 py-2 text-xl border-b border-blue-800 text-blue-800">{{auth()->user()->name}}</div>
                <x-dropdown-link href="{{ route('aanwezighedenbeheer') }}">Aanwezighedenbeheer</x-dropdown-link>
                <x-dropdown-link href="{{ route('fotobeheer') }}">Fotobeheer</x-dropdown-link>
                <x-dropdown-link href="{{ route('galerijbeheer') }}">Galerijbeheer</x-dropdown-link>
                <x-dropdown-link href="{{ route('kleding_bestellingen') }}">Kleding bestellingen</x-dropdown-link>
                <x-dropdown-link href="{{ route('kledingbeheer') }}">Kledingbeheer</x-dropdown-link>
                <x-dropdown-link href="{{ route('ledenbeheer') }}">Ledenbeheer</x-dropdown-link>
                <x-dropdown-link href="{{ route('trajectbeheer') }}">Trajectbeheer</x-dropdown-link>
                <x-dropdown-link href="{{ route('webtekstbeheer') }}">Webtekstbeheer</x-dropdown-link>
                <x-dropdown-link href="{{ route('dashboard') }}">Dashboard</x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Logout</button>
                </form>
            </x-slot>
        </x-dropdown>
    @endauth
</div>
