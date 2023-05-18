<div>
    <section
            class="p-0 mb-4 flex flex-col gap-2">
        <div class="p-4 flex justify-between items-start gap-4">
            <div class="relative w-64">
                <x-input id="newText" type="text" placeholder="New text"
                         wire:model.defer="newText.location"

                             class="w-full shadow-md placeholder-gray-300"/>
                <x-input id="newText" type="text" placeholder="New text"
                         wire:model.defer="newText.description"
                         class="w-full shadow-md placeholder-gray-300"/>
<x-button wire:click="createText">Nieuwe Text</x-button>
            </div>

        </div>
        <x-input-error for="newText" class="m-4 -mt-4 w-full"/>
        <div
                style="display: none"
                class="text-sky-900 bg-sky-50 border-t p-4">
            <list type="ul" class="list-outside mx-4 text-sm">
                <li>
                    <b>A new genre</b> can be added by typing in the input field and pressing <b>enter</b> or
                    <b>tab</b>. Press <b>escape</b> to undo.
                </li>
                <li>
                    <b>Edit a genre</b> by clicking the
                    icon or by clicking on the genre name. Press <b>enter</b> to save, <b>escape</b> to undo.
                </li>
                <li>
                    Clicking the
                    icon will toggle this message on and off.
                </li>
            </list>
        </div>
    </section>

    <section>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-14">
                <col class="w-20">
                <col class="w-16">
                <col class="w-max">
            </colgroup>
            <thead>
            <tr class="bg-gray-100 text-gray-700 [&>th]:p-2 cursor-pointer">
                <th>
                    <span data-tippy-content="Order by id">#</span>

                </th>
                <th>
                <span data-tippy-content="Order by # records">

                </span>

                </th>
                <th></th>
                <th class="text-left">
                    <span data-tippy-content="Order by genre">Text</span>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($texts as $text)
            <tr class="border-t border-gray-300 [&>td]:p-2">
                <td>{{$text->id}}</td>
                <td>{{$text->location}}</td>
                <td>

                    <div class="flex gap-1 justify-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">

                    </div>
                </td>
                <td
                        class="text-left cursor-pointer">{{$text->description}}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</div>
