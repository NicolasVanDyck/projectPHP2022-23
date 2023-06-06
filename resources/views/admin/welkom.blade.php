<x-templatelayout>

<x-slot name="title">Welkom</x-slot>
<x-slot name="description">Op deze pagina kan u als admin zien welke onderdelen u kan beheren.</x-slot>

<div class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
    <div class='w-full max-w-3xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
        <div class='max-w-3xl mx-auto'>
            <div class='p-8'>
                <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>Welkom {{Auth::user()->name}}!</p>
                <p class='text-[#7C7C80] font-[15px] mt-6'>
                    Als administrator kan u wijzigingen aanbrengen aan de website. U kan kiezen voor:
                </p>
                <br>
                <ol>
                    <li>&#8594; <b>Aanwezighedenbeheer</b> om leden aan en af te melden voor ritten.</li>
                    <li>&#8594; <b>Fotobeheer</b> om foto's toe te voegen, aan te passen of te verwijderen. En om te kiezen welke foto's er op de homepage getoond zullen worden.</li>
                    <li>&#8594; <b>Kleding bestellingen</b> om een overzicht te krijgen van de bestellingen.</li>
                    <li>&#8594; <b>Kledingbeheer</b> om producten toe te voegen of te verwijderen, inclusief maat.</li>
                    <li>&#8594; <b>Ledenbeheer</b> om leden toe te voegen, te verwijderen of gegevens aan te passen.</li>
                    <li>&#8594; <b>Trajectbeheer</b> om groepsritten aan te maken.</li>
                    <li>&#8594; <b>Webtekstbeheer</b> om de teksten op de home- en contactpagina aan te passen.</li>
                </ol>
            </div>
        </div>
    </div>


</div>


</x-templatelayout>