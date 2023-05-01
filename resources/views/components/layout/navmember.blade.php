<nav>
{{--    1ste regel--}}
    <a href={{route('dashboard')}} class="underline">Dashboard</a>
    <a href={{route('deelname_groep')}} class="underline">Deelname groepsritten</a>
    <a href={{route('individuele_trajecten')}} class="underline">Individuele trajecten</a>
    <a href={{route('profile.show')}} class="underline">Profiel</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="underline">Logout</button>
    </form>
{{--    2de regel--}}
    <a href={{route('home')}} class="underline">Home</a>
    <a href={{route('kleding')}} class="underline">Clubkledij bestellen</a>
    <a href={{route('galerij')}} class="underline">Galerij bekijken</a>
    <a href={{route('contact')}} class="underline">Contact</a>
{{--    Enkel bij admin komt de knop beheren erbij--}}
    @if (auth()->user()->is_admin == true)
        <a href={{route('welkom')}} class="underline">Beheren</a>
    @endif
</nav>
