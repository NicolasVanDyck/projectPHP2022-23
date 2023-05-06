<div class="container mx-auto p-4 flex justify-between">
    <div class="flex items-center mr-8 transition hover:scale-105 duration-1000">
        {{-- Logo --}}
{{--        <a href="{{ route('dashboard') }}">--}}
{{--            --}}{{--            <img src="{{asset('icons/favicon-32x32.png')}}" alt="Logo" />--}}
{{--        </a>--}}
        <h1>De Wezeldrivers</h1>
    </div>
    @auth
        <div class="flex w-full justify-between flex-grow">
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
                            <x-dropdown-link href="{{ route('dashboard') }}">Dashboard</x-dropdown-link>
                            <x-dropdown-link href="{{ route('individuele_trajecten') }}">Individuele Trajecten</x-dropdown-link>
                            <x-dropdown-link href="{{ route('deelname_groep') }}">Deelname Groep</x-dropdown-link>
                            <x-dropdown-link href="{{ route('galerij') }}">Galerij</x-dropdown-link>
                            <x-dropdown-link href="{{ route('kleding') }}">Profiel</x-dropdown-link>
                            <x-dropdown-link href="{{ route('profile.show') }}">Contact</x-dropdown-link>
                            @if(auth()->user()->is_admin)
                            <x-dropdown-link href="{{ route('welkom') }}">Beheren</x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Logout</button>
                            </form>
                        </x-slot>
                    </x-dropdown>
    @endauth
</div>
