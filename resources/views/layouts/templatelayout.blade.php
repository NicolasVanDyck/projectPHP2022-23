<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--    <x-layout.favicons/>--}}
    <meta name="description" content={{  $description ?? 'BasisDescription' }}>
    <title>{{  $title ?? 'BasisTitel' }}</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased relative">
<div class="flex flex-col space-y-4 min-h-screen text-gray-800 bg-gray-100">
    <header class="shadow bg-white sticky inset-0 backdrop-blur-sm z-10">
        <nav>
            @auth
                @if(Auth::user()->is_admin && str_contains(Request::url(), 'admin') )
                    @livewire('layout.nav-bar-admin')
                @endif
                @if(str_contains(Request::url(), 'member'))
                        @livewire('layout.nav-bar-member')
                @endif
            @endauth
            @guest
                    @livewire('layout.nav-bar')
            @endguest

        </nav>
    </header>
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <footer class="text-center absolute bottom-0 w-[100%]">
        <x-layout.footer />
    </footer>
    @livewireScripts

</div>
</body>
</html>
