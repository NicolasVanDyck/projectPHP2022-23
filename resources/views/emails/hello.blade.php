<x-mail::message>
    <h2>Vraag vanuit het contactformulier</h2>

Het bericht kom van {{$voornaam}} {{$achternaam}}.
Het emailadres is: {{$email}}.
{{$voornaam}} wil graag iets weten over: {{$dropdown}}.<br>
Vraag: {{$bericht}}



Klik op de knop hieronder om de vraag te beantwoorden.
    <x-mail::button :url="'mailto:' . $email">
        Beantwoord e-mail
    </x-mail::button>

</x-mail::message>

