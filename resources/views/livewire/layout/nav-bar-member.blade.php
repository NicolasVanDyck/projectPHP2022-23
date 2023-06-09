<div class="flex justify-between">
    @auth
        <div class="h-12 w-12 m-2" name="logo">
            <x-authentication-card-logo />
        </div>
        <div class="px-2 py-4 flex justify-between">
            <div class="hidden ml-2 lg:flex relative space-x-5 pr-2">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-nav-link>
                <x-nav-link href="{{ route('individuele_trajecten') }}"
                            :active="request()->routeIs('individuele_trajecten')">
                    Individuele Trajecten
                </x-nav-link>
                <x-nav-link href="{{ route('deelname_groep') }}" :active="request()->routeIs('deelname_groep')">
                    Deelname Groep
                </x-nav-link>
                <x-nav-link href="{{ route('galerij') }}" :active="request()->routeIs('galerij')">
                    Galerij
                </x-nav-link>
                <x-nav-link href="{{ route('kleding') }}" :active="request()->routeIs('kleding')">
                    Kleding
                </x-nav-link>
                <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    Profiel
                </x-nav-link>
                @if(auth()->user()->is_admin)
                    <x-nav-link href="{{ route('welkom') }}" :active="request()->routeIs('welkom')">
                        Beheren
                    </x-nav-link>
                @endif
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
            <img class="rounded-full w-12 h-12 cursor-pointer md:cursor-default"
                 src="{{ $avatar }}"
                 alt="{{ auth()->user()->name }}">
        </div>
        <div class="lg:hidden">
            <x-dropdown align="right" width="48" class="m-2">
                avatar
                <x-slot name="trigger">
                    <img class="m-2 rounded-full h-12 w-12 m-2 cursor-pointer"
                         src="{{ $avatar }}"
                         alt="{{ auth()->user()->name }}">
                </x-slot>
                <x-slot name="content">
                    <div
                        class="block px-4 py-2 text-xl border-b border-blue-800 text-blue-800">{{auth()->user()->name}}</div>
                    <x-dropdown-link href="{{ route('dashboard') }}">Dashboard</x-dropdown-link>
                    <x-dropdown-link href="{{ route('individuele_trajecten') }}">Individuele Trajecten
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('deelname_groep') }}">Deelname Groep</x-dropdown-link>
                    <x-dropdown-link href="{{ route('galerij') }}">Galerij</x-dropdown-link>
                    <x-dropdown-link href="{{ route('kleding') }}">Kleding</x-dropdown-link>
                    <x-dropdown-link href="{{ route('profile.show') }}">Profiel</x-dropdown-link>
                    @if(auth()->user()->is_admin)
                        <x-dropdown-link href="{{ route('welkom') }}">Beheren</x-dropdown-link>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block w-full text-red-500 text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                            Logout
                        </button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @endauth
</div>
