<div>
    @if(str_contains(Request::url(), 'admin'))
    <div class='flex-col items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
        @foreach($texts as $text)
        <div class='mb-4 max-w-[70%] mx-auto bg-white
        rounded-3xl shadow-xl overflow-hidden text-center p-4'>

{{--    Onderstaande zorgt ervoor dat er geen aparte component nodig is voor alle drie de views . --}}

        <ul wire:key="text_{{$text->id}}">
            <li class="text-xl">{{$text->location}}</li>
{{--    Als de 'id' van property editText != aan de 'id' van de huidige tekst in de loop, toont hij de knop.    --}}
            @if($editText['id'] !== $text->id)
{{--                Hierbinnen, zodat dit verdwijnt bij het klikken op de knop  --}}
                <li class="text-base mb-2">{{ $text->description }}</li>
                <x-button wire:click="editExistingText({{$text->id}})" class="mb-2 text-white">
                    Pas tekst aan
                </x-button>
{{--            Is hij wel gelijk, omdat functie editExistingText de waarde van de huidige tekst als id invult, dan kan je aanpassen --}}
            @else
                <td>
                    <div class="flex flex-col text-left">
                                <textarea id="edit_{{ $text->id }}" cols="60" rows="10"
                                          wire:model.defer="editText.description">
                                </textarea>
                        <div class="container flex flex-row">
                            <x-button wire:click="updateText({{ $text->id }})" class="mt-2 text-white">
                                Opslaan
                            </x-button>
                            <x-button wire:click="resetEditText()" class="mt-2 text-white">
                                Annuleren
                            </x-button>
                        </div>
                        <x-input-error for="editText.description" class="mt-2"/>
                    </div>
                </td>
            @endif
        </ul>
        </div>
        @endforeach
    </div>
            @endif

{{--    De URL wordt gecheckt en op basis daarvan wordt de juiste tekst getoond  --}}
        @if(str_contains(Request::url(), 'contact'))
            <div class='mb-4 max-w-[70%] mx-auto bg-white
        rounded-3xl shadow-xl overflow-hidden text-center p-4'>
                <p>{{$contact->description}}</p>
            </div>
        @else
{{--            Uitsluiten, anders toont hij deze nog eens op de admin ook--}}
            @if(str_contains(Request::url(), 'admin'))
            <div class="hidden"></div>
            @else
                <div class='mb-4 max-w-[70%] mx-auto bg-white
        rounded-3xl shadow-xl overflow-hidden text-center p-4'>
                    <p>{{$home->description}}</p>
                </div>
            @endif
        @endif
</div>