<x-templatelayout>

<x-slot name="title">Trajectbeheer</x-slot>
<x-slot name="description">Op deze pagina kan u als admin de trajecten beheren.</x-slot>

    <div class='w-full max-w-md mx-auto bg-white rounded-3xl shadow-xl'>
        <div class='flex flex-col'>
            <div class='p-8'>
                <p class='font-bold text-gray-700 text-2xl leading-7 mb-1'>TRAJECTBEHEER!</p>
                <p class='text-gray-600 text-base mt-6'>Hoe werkt het? Het proces is eenvoudig en intuïtief. Als admin log je in op het platform en ga je naar de sectie voor groepsritten. Daar vind je een overzicht van alle beschikbare routes die voor de clubleden beschikbaar zijn. Je kunt eenvoudig een route selecteren en de bijbehorende afstand bekijken.</p>
                <p class='text-gray-600 text-base mt-6'>Vervolgens kies je de gewenste datum en tijd voor de start van de groepsrit, evenals de einddatum en -tijd. Hiermee stel je de duur van de rit in. Na het invullen van deze informatie kun je de groepsrit aanmaken door op de "Maak je groepsrit" knop te klikken.</p>
                <p class='text-gray-600 text-base mt-6'>Ons systeem controleert automatisch of alle vereiste velden zijn ingevuld. Als er ontbrekende gegevens zijn, ontvang je daarover meldingen en worden de ontbrekende velden gemarkeerd. Zodra alles correct is ingevuld, wordt de groepsrit aangemaakt en wordt er een succesbericht weergegeven.</p>
                <p class='text-gray-600 text-base mt-6'>De aangemaakte groepsrit wordt vervolgens weergegeven in het overzicht van geplande ritten, zodat alle clubleden op de hoogte kunnen worden gebracht. Als beheerder heb je ook de mogelijkheid om ritten te bewerken of te verwijderen als dat nodig is.</p>
            </div>
        </div>
    </div>




<livewire:traject-beheer></livewire:traject-beheer>
<livewire:show-group-tours></livewire:show-group-tours>

</x-templatelayout>
