<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content={{  $description ?? 'BasisDescription' }}>
    <title>{{  $title ?? 'BasisTitel' }}</title>
    <link rel="icon" href="{{asset('assets/logo/favicon.png')}}" type="icon"/>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-hero-pattern bg-cover bg-center bg-no-repeat lg:bg-center">
<!--Hero-->
<div class="flex flex-col h-screen">
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


    <main class="border-t-2 border-blue-900 lg:border-none text-gray-50">
        <div class="container mx-auto">
            {{ $slot }}
        </div>
    </main>


    <!--Footer-->
    <x-layout.footer/>
</div>

@livewireScripts
</body>
</html>
