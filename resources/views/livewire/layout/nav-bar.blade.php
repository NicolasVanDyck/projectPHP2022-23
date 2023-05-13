{{--<div class="container mx-auto p-4 flex justify-between">--}}
{{--     left navigation--}}
{{--    <div class="flex items-center space-x-2 transition hover:scale-105 duration-1000">--}}
{{--         Logo--}}
{{--        <a href="{{ route('dashboard') }}">--}}
{{--            <img src="{{asset('icons/icons-32x32.png')}}" alt="Logo" />--}}
{{--        </a>--}}
{{--        <h1>De Wezeldrivers</h1>--}}
{{--    </div>--}}

{{--    <div class="relative flex items-center space-x-2">--}}
{{--        @guest--}}
{{--            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">--}}
{{--                Home--}}
{{--            </x-nav-link>--}}
{{--            <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">--}}
{{--                Contact--}}
{{--            </x-nav-link>--}}
{{--            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">--}}
{{--                Login--}}
{{--            </x-nav-link>--}}
{{--        @endguest--}}
{{--    </div>--}}
{{--</div>--}}


<div class="container mx-auto p-4 flex justify-between">
    {{-- left navigation--}}
    <div class="flex items-center space-x-2 transition hover:scale-105 duration-1000">
        {{-- Logo--}}
        <a href="{{ route('dashboard') }}">
            <img src="{{asset('assets/logo/favicon.png')}}" alt="Logo" class="h-16 object-contain" />
        </a>

    </div>
    <h1 class="hidden md:block text-5xl font-extrabold tracking-tight text-transparent bg-gradient-to-r from-yellow-300 via-orange-500 to-red-950 bg-clip-text">
        Wezel<span class="text-blue-500">Drivers</span>
    </h1>




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
    </div>
</div>







