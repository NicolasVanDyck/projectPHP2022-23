<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content={{  $description ?? 'BasisDescription' }}>
    <title>{{  $title ?? 'BasisTitel' }}</title>
    <link rel="icon" href="{{asset('assets/logo/Logo WZD.png')}}" type="icon"/>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#073360] min-h-screen ">
<!--Hero-->
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
<main>
    {{ $slot }}
</main>
<!--Footer-->
<footer class="mt-auto bg-[#f5f5f5] sticky top-[100vh]">
    <x-layout.footer/>
</footer>


@livewireScripts
</body>
</html>
