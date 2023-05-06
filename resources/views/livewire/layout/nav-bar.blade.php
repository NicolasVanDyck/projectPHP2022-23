<div class="container mx-auto p-4 flex justify-between">
    {{-- left navigation--}}
    <div class="flex items-center space-x-2 transition hover:scale-105 duration-1000">
        {{-- Logo --}}
{{--        <a href="{{ route('dashboard') }}">--}}
{{--            <img src="{{asset('icons/favicon-32x32.png')}}" alt="Logo" />--}}
{{--        </a>--}}
        <h1>De Wezeldrivers</h1>

    </div>

    {{-- right navigation --}}
    <div class="relative flex items-center space-x-2">
        @guest
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Home
            </x-nav-link>
            <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                Contact
            </x-nav-link>
            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                Login
            </x-nav-link>
        @endguest


        {{-- dropdown navigation--}}
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
                    <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('login')">
                        Beheren
                    </x-nav-link>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Logout</button>
                </form>
            @endauth



{{--            <x-dropdown align="right" width="48">--}}
{{--                --}}{{-- avatar --}}
{{--                <x-slot name="trigger">--}}
{{--                    <img class="rounded-full h-8 w-8 cursor-pointer"--}}
{{--                         src="{{ $avatar }}"--}}
{{--                         alt="{{ auth()->user()->name }}">--}}
{{--                </x-slot>--}}
{{--                <x-slot name="content">--}}
{{--                    --}}{{-- all users --}}
{{--                    <div class="block px-4 py-2 text-xl border-b border-blue-800 text-blue-800">{{auth()->user()->name}}</div>--}}
{{--                    <x-dropdown-link href="{{ route('dashboard') }}">Dashboard</x-dropdown-link>--}}
{{--                    <x-dropdown-link href="{{ route('profile.show') }}">Profiel</x-dropdown-link>--}}
{{--                    <x-dropdown-link href="{{ route('deelname_groep') }}">Contact</x-dropdown-link>--}}
{{--                    <div class="border-t border-gray-100"></div>--}}
{{--                    <form method="POST" action="{{ route('logout') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">Logout</button>--}}
{{--                    </form>--}}
{{--                    <div class="border-t border-gray-100"></div>--}}
{{--                    --}}{{----}}{{-- admins only --}}
{{--                    <div class="block px-4 py-2 text-xl border-b border-blue-800 text-blue-800">{{ $admin ?? 'Admin' }}</div>--}}
{{--                    <x-dropdown-link href="{{ route('admin.appointments.index') }}">Afspraken--}}
{{--                    </x-dropdown-link>--}}
{{--                    <x-dropdown-link href="{{ route('admin.patients.exercises.index') }}">Oefeningen--}}
{{--                    </x-dropdown-link>--}}
{{--                    @if(auth()->user()->admin == true)--}}
{{--                        <x-dropdown-link href="{{ route('admin.patients.index') }}">Patiënten</x-dropdown-link>--}}
{{--                        <x-dropdown-link href="{{ route('admin.patients.programs.index') }}">Programma's--}}
{{--                        </x-dropdown-link>--}}
{{--                    @endif--}}
{{--                </x-slot>--}}
{{--            </x-dropdown>--}}

    </div>
</div>
