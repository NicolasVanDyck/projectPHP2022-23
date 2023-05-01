<nav>
    {{--    1ste regel--}}
    <a href={{route('aanwezighedenbeheer')}} class="underline">Aanwezighedenbeheer</a>
    <a href={{route('ledenbeheer')}} class="underline">Ledenbeheer</a>
    <a href={{route('fotobeheer')}} class="underline">Fotobeheer</a>
    <a href={{route('galerijbeheer')}} class="underline">Galerijbeheer</a>

    {{--    2de regel--}}
    <a href={{route('kleding_bestellingen')}} class="underline">Kleding bestellingen</a>
    <a href={{route('kledingbeheer')}} class="underline">Kledingbeheer</a>
    <a href={{route('trajectbeheer')}} class="underline">Trajectbeheer</a>
    <a href={{route('webtekstbeheer')}} class="underline">Webtekstbeheer</a>
    <a href={{route('dashboard')}} class="underline">Dashboard</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="underline">Logout</button>
    </form>
</nav>
