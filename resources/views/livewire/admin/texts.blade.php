{{--<div>--}}
{{--    <ul>--}}
{{--        @foreach($texts as $text)--}}
{{--            <li class="text-2xl font-bold">{{ $text->id }}</li>--}}
{{--            <li class="text-xl">{{$text->location}}</li>--}}
{{--            <li class="text-base">{{ $text->description }}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--</div>--}}
<div>
@foreach($texts as $text)

    @if(str_contains(Request::url(), 'admin'))
        <ul wire:key="text_{{$text->id}}">
            <li class="text-2xl font-bold">{{ $text->id }}</li>
            <li class="text-xl">{{$text->location}}</li>
            <li class="text-base mb-2">{{ $text->description }}</li>
            @if($editText['id'] !== $text->id)
                <x-button wire:click="editExistingText({{$text->id}})" class="mb-2 text-white">Pas tekst aan</x-button>
            @endif
            @if($editText['id'] !== $text->id)
                <p
                        class="text-left cursor-pointer">
                </p>
            @else
                <td>
                    <div class="flex flex-col text-left">
                                <textarea id="edit_{{ $text->id }}" cols="60" rows="10"
                                          wire:model.defer="editText.description">
                                </textarea>
                        <div class="container flex flex-row">
                            <x-button wire:click="updateText({{ $text->id }})" class="mt-2 text-white">Opslaan
                            </x-button>
                            <x-button wire:click="resetEditText()" class="mt-2 text-white">Annuleren
                            </x-button>
                        </div>
                        <x-input-error for="editText.description" class="mt-2"/>
                    </div>
                </td>
            @endif
        @elseif(str_contains(Request::url(), 'contact'))
        @if($text->id == 2)
            <div class>
                <p>{{$text->description}}</p>
            </div>
        @endif
        @elseif(str_contains(Request::url(), '/'))
            @if($text->id == 1)
                <div class>
                    <p>{{$text->description}}</p>
                </div>
            @endif
            {{--        Om tekst op de contactpagina te tonen--}}

    @endif
@endforeach
            </ul>
</div>



{{--    Om tekst op de homepagina te tonen--}}
{{--    @if(str_contains(Request::url(), '/'))--}}
{{--        @if($text->id == 1)--}}
{{--            <div class>--}}
{{--                <p>{{$text->description}}</p>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        Om tekst op de contactpagina te tonen--}}
{{--    @elseif(str_contains(Request::url(), 'contact'))--}}
{{--        @if($text->id == 2)--}}
{{--            <div class>--}}
{{--                <p>{{$text->description}}</p>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        Admingedeelte--}}
{{--    @elseif(str_contains(Request::url(), 'admin'))--}}
{{--                <ul wire:key="text_{{$text->id}}">--}}
{{--                    <li class="text-2xl font-bold">{{ $text->id }}</li>--}}
{{--                    <li class="text-xl">{{$text->location}}</li>--}}
{{--                    <li class="text-base mb-2">{{ $text->description }}</li>--}}
{{--                        @if($editText['id'] !== $text->id)--}}
{{--                            <x-button wire:click="editExistingText({{$text->id}})" class="mb-2 text-white">Pas tekst aan</x-button>--}}
{{--                        @endif--}}
{{--                        @if($editText['id'] !== $text->id)--}}
{{--                            <p--}}
{{--                                class="text-left cursor-pointer">--}}
{{--                            </p>--}}
{{--                        @else--}}
{{--                        <td>--}}
{{--                            <div class="flex flex-col text-left">--}}
{{--                                <textarea id="edit_{{ $text->id }}" cols="60" rows="10"--}}
{{--                                             wire:model.defer="editText.description">--}}
{{--                                </textarea>--}}
{{--                                <div class="container flex flex-row">--}}
{{--                                    <x-button wire:click="updateText({{ $text->id }})" class="mt-2 text-white">Opslaan--}}
{{--                                    </x-button>--}}
{{--                                    <x-button wire:click="resetEditText()" class="mt-2 text-white">Annuleren--}}
{{--                                    </x-button>--}}
{{--                                </div>--}}
{{--                                <x-input-error for="editText.description" class="mt-2"/>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        @endif--}}
{{--    @endif--}}
{{--    @endforeach--}}
{{--    </ul>--}}
