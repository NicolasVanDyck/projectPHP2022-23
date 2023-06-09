<div class="flex justify-between">
    @auth
        <div class="h-12 w-12 m-2" name="logo">
            <img src="{{ asset('assets/logo/Logo WZD.png') }}" alt="Logo" width="200" height="200">
        </div>
        <div class="px-2 py-4 flex justify-between">
            <div class="hidden ml-2 lg:flex relative space-x-5 pr-2">
            <x-nav-link href="{{ route('aanwezighedenbeheer') }}" :active="request()->routeIs('aanwezighedenbeheer')">
                Aanwezighedenbeheer
            </x-nav-link>
            <x-nav-link href="{{ route('fotobeheer') }}" :active="request()->routeIs('fotobeheer')">
                Fotobeheer
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
            <x-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-500">
                        Logout
                    </button>
                </form>
            </x-nav-link>
            </div>
        </div>

        <div class="hidden lg:block m-2">
            <img class="rounded-full h-12 w-12"
                 src="{{ $avatar }}"
                 alt="{{ auth()->user()->name }}">
        </div>
        <div class="lg:hidden flex">
            <x-dropdown width="48">
                avatar
                <x-slot name="trigger">
                    <img class="m-2 rounded-full h-12 w-12 cursor-pointer"
                         src="{{ $avatar }}"
                         alt="{{ auth()->user()->name }}">
                </x-slot>
                <x-slot name="content">
                    <div
                        class="block px-4 py-2 text-xl border-b border-blue-800 text-blue-800">{{auth()->user()->name}}</div>
                    <x-dropdown-link href="{{ route('aanwezighedenbeheer') }}">Aanwezighedenbeheer</x-dropdown-link>
                    <x-dropdown-link href="{{ route('fotobeheer') }}">Fotobeheer</x-dropdown-link>
                    <x-dropdown-link href="{{ route('kleding_bestellingen') }}">Kleding bestellingen</x-dropdown-link>
                    <x-dropdown-link href="{{ route('kledingbeheer') }}">Kledingbeheer</x-dropdown-link>
                    <x-dropdown-link href="{{ route('ledenbeheer') }}">Ledenbeheer</x-dropdown-link>
                    <x-dropdown-link href="{{ route('trajectbeheer') }}">Trajectbeheer</x-dropdown-link>
                    <x-dropdown-link href="{{ route('webtekstbeheer') }}">Webtekstbeheer</x-dropdown-link>
                    <x-dropdown-link href="{{ route('dashboard') }}">Dashboard</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block text-red-500 w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                            Logout
                        </button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @endauth
</div>
