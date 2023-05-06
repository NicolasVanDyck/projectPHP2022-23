<div class="container mx-auto p-4 flex justify-between">
    <div class="flex items-center space-x-2 transition hover:scale-105 duration-1000">
        {{-- Logo --}}
        <a href="{{ route('dashboard') }}">
            {{--            <img src="{{asset('icons/favicon-32x32.png')}}" alt="Logo" />--}}
        </a>
        <h1>De Wezeldrivers</h1>
    </div>
    @auth
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-nav-link>
        <x-nav-link href="{{ route('deelname_groep') }}" :active="request()->routeIs('deelname_groep')">
            Deelname Groep
        </x-nav-link>
        <x-nav-link href="{{ route('galerij') }}" :active="request()->routeIs('galerij')">
            Galerij
        </x-nav-link>
        <x-nav-link href="{{ route('individuele_trajecten') }}" :active="request()->routeIs('individuele_trajecten')">
            Individuele Trajecten
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
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Logout</button>
        </form>
    @endauth
</div>
