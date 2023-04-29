<nav>
{{--    1ste regel--}}
    <a href="#" class="underline">Dashboard</a>
    <a href="#" class="underline">Deelname groepsritten</a>
    <a href="#" class="underline">Individuele trajecten</a>
    <a href="#" class="underline">Profiel</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="underline">Logout</button>
    </form>
{{--    2de regel--}}
    <a href="#" class="underline">Home</a>
    <a href="#" class="underline">Clubkledij bestellen</a>
    <a href="#" class="underline">Galerij bekijken</a>
    <a href="#" class="underline">Contact</a>

</nav>
