<div class="mx-auto px-2 py-4 flex justify-between">
    {{-- left navigation--}}
    <div class="relative space-x-5 pr-2">
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

    {{--    --}}{{-- right navigation--}}
    {{--    <div class="flex w-[80px] transition hover:scale-105 duration-1000">--}}
    {{--        --}}{{-- Logo--}}
    {{--        <a href="{{ route('dashboard') }}">--}}
    {{--            <img src="{{asset('assets/logo/favicon.png')}}" alt="Logo" class=""/>--}}
    {{--        </a>--}}

    {{--    </div>--}}
</div>







