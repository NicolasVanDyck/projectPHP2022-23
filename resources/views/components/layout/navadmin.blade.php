<nav>
    {{--    1ste regel--}}
    <a href={{'aanwezighedenbeheer'}} class="underline">Aanwezighedenbeheer</a>
    <a href={{'ledenbeheer'}} class="underline">Ledenbeheer</a>
    <a href={{'fotobeheer'}} class="underline">Fotobeheer</a>
    <a href={{'galerijbeheer'}} class="underline">Galerijbeheer</a>

    {{--    2de regel--}}
    <a href={{'kleding_bestellingen'}} class="underline">Kleding bestellingen</a>
    <a href={{'kledingbeheer'}} class="underline">Kledingbeheer</a>
    <a href={{'trajectbeheer'}} class="underline">Trajectbeheer</a>
    <a href={{'webtekstbeheer'}} class="underline">Webtekstbeheer</a>
    <a href={{'dashboard'}} class="underline">Dashboard</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="underline">Logout</button>
    </form>
</nav>
