<x-mail::message>
    <h2>Vraag vanuit het contactformulier</h2>

Het bericht komt van {{$voornaam}} {{$achternaam}}.<br>
Het emailadres is: {{$email}}.<br>
{{$voornaam}} wil graag iets weten over: {{$dropdown}}.<br>
Vraag: {{$bericht}}<br>



Klik op de knop hieronder om de vraag te beantwoorden.
    <x-mail::button :url="'mailto:' . $email">
        Beantwoord e-mail
    </x-mail::button>

</x-mail::message>

