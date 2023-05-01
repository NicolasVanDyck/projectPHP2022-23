<nav>
{{--    1ste regel--}}
    <a href={{'dashboard'}} class="underline">Dashboard</a>
    <a href={{'deelname_groep'}} class="underline">Deelname groepsritten</a>
    <a href={{'individuele_trajecten'}} class="underline">Individuele trajecten</a>
    <a href={{'profile.show'}} class="underline">Profiel</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="underline">Logout</button>
    </form>
{{--    2de regel--}}
    <a href={{'/'}} class="underline">Home</a>
    <a href={{'kleding'}} class="underline">Clubkledij bestellen</a>
    <a href={{'galerij'}} class="underline">Galerij bekijken</a>
    <a href={{'contact'}} class="underline">Contact</a>
{{--    Nog te checken; voorlopig in commentaar anders crasht het--}}
    @if (auth()->user()->is_admin == true)
        <a href={{'admin/welkom'}} class="underline">Beheren</a>
    @endif
</nav>
