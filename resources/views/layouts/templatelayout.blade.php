<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--    <x-layout.favicons/>--}}
    <meta name="description" content={{  $description ?? 'BasisDescription' }}>
    <title>{{  $title ?? 'BasisTitel' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
<div class="flex flex-col space-y-4 min-h-screen text-gray-800 bg-gray-100">
    <header class="shadow bg-white sticky inset-0 backdrop-blur-sm z-10">
        <nav>     {{--@if (Auth::user()->is_admin == 1 | true)--}}

            {{--                @if(Auth::user()->is_admin == 1 )--}}
            {{--                    @include('<x-layout.navadmin /> ')--}}
            {{--                @elseif (Auth::user()->is_admin == 0)--}}
            {{--                    @include('<x-layout.navmember/>')--}}
            {{--                @else--}}
            {{--                    @include('<x-layout.nav/>')--}}
            {{--                @endif--}}

        {{ $nav ?? 'BasisNav' }}
        </nav>
    </header>
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <footer class="text-center bg-white">
        <x-layout.footer />
    </footer>


</div>
</body>
</html>
