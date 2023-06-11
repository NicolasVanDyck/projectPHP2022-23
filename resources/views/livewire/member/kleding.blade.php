<div>

    <div class="sm:ml-7 sm:mr-7 sm:mb-10 @container">

        <div class="mt-4 flex flex-row justify-center m-2">
            <p class="text-white mt-1 mr-2">Bestellen kan tot: {{ date('d/m/Y', strtotime($this->getDeadlineDate())) }}</p>

            {{--Link to kleding/mijn-bestelling if the use already has an order in the Orders table--}}
            @if( $this->hasOrders() )
                <div>
                    <x-button
                        class="@sm:mb-2 p-2 text-white flex flex-row @sm:w-fit @sm:h-fit w-[80px] h-[80px] bg-[#11253e] hover:bg-[#11253e] active:bg-[#11253e]"
                        wire:click="redirectToMyOrder">
                        <p class="@sm:visible collapse">Mijn bestelling</p>
                        <x-heroicon-m-shopping-bag class="@sm:ml-1 @sm:h-6 @sm:w-6 h-10 w-10 mx-auto my-auto @sm:mx-0 @sm:my-0"/>
                    </x-button>
                </div>
            @endif
        </div>

        <form wire:submit.prevent="submitForm" class="flex flex-col @md:justify-evenly">
            @csrf
            @if (session()->has('message'))
                <div class="bg-green-200 text-2xl">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table-auto md:mx-auto bg-[#e6ebef] shadow-2xl @md:rounded-md">
                <thead class="text-left bg-[#cdd6df] overflow-hidden">
                    <tr class="[&>th]:text-[#192c44] [&>th]:p-4 text-sm @lg:text-md">
                        <th>Naam</th>
                        <th class="hidden sm:table-cell">Maat</th>
                        <th>Prijs</th>
                        <th class="hidden sm:table-cell">Aantal</th>
                        <th class="pr-0">Totaal</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($products as $index => $product)
                    <tr class="[&>td]:p-2">
                        <td class="border-y border-[#d4dde9]">
                            <div class="text-[#617691] p-2 text-sm @lg:text-md">
                                {{ $product->name }}
                            </div>
                            <div class="sm:hidden">
                                <select
                                    wire:model="selectedSize.{{ $index }}"
                                    class="ml-2 text-[#11253e] rounded-md text-sm border-[#d4dde9] max-w-fit">
                                    <option value="" class="text-[#11253e]">Maat</option>
                                    @foreach($this->getSizesForSelectedProduct($product->id, $index) as $size)
                                        <option value="{{ $size->id }}" class="text-[#11253e] @sm:text-sm @lg:text-md">{{ $size->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sm:hidden py-4 ">
                                <input type="number" class="w-20 ml-2 text-[#11253e] border border-[#d4dde9] rounded-md text-sm" min="0" max="10"
                                       value="{{ $amounts[$product->id] ?? 0 }}"
                                       wire:model.debounce.500ms="amounts.{{ $product->id }}">
                            </div>
                        </td>
                        <td class="hidden sm:table-cell sm:border sm:border-[#d4dde9]" style="border-right: none; border-left: none">
                            <select
                                wire:model="selectedSize.{{ $index }}"
                                class="hover:cursor-pointer text-[#11253e] rounded-md text-sm border-[#d4dde9]"
                            >
                                <option value="">Kies je maat</option>
                                @foreach($this->getSizesForSelectedProduct($product->id, $index) as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="border-collapse border-y border-[#d4dde9] text-[#617691] text-xs @lg:text-md border-l @lg:border-l-0 min-w-full @md:min-w-fit">
                            € {{ $product->price }}</td>
                        <td class="hidden sm:table-cell border-y border-[#d4dde9]">
                            <input type="number" min="0" max="10"
                                   class="w-20 text-[#11253e] rounded-md text-sm border-[#d4dde9]"
                                   value="{{ $amounts[$product->id] ?? 0 }}"
                                   wire:model.debounce.500ms="amounts.{{ $product->id }}">
                        </td>
                        <td class="border-y border-[#d4dde9] text-[#617691] text-xs @lg:text-md border-l @lg:border-l-0">
                            {{ $this->getTotalForProduct($product->id) ?? 0}}
                        </td>
                    </tr>
                    @if (empty($selectedSize[$index]) && !empty($this->getAmount($product->id)))
                        <tr class="text-xs @lg:text-md">
                            <td colspan="5" class="text-red-500">
                                Gelieve een maat op te geven.
                            </td>
                        </tr>
                    @elseif (!empty($selectedSize[$index]) && empty($this->getAmount($product->id)))
                        <tr class="text-xs @lg:text-md">
                            <td colspan="5" class="text-red-500">
                                Gelieve een hoeveelheid op te geven.
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td class="p-2">Geen kleding gevonden</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                    <tr class="[&>td]:text-[#617691] [&>td]:p-0 [&>td]:rounded-md [&>td]:text-lg [&>td]:font-semibold">
                        <td class="sm:table-cell hidden"></td>
                        <td class="text-right">Totaal</td>
                        <td class="border-t-2 border-blue-400 sm:border-none md:border-none text-center">
                            € {{ $this->getTotal() }}
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="flex justify-center mt-4 mb-10">
                <x-button wire:loading.attr="disabled" type="submit">
                    <span wire:loading.remove>Bestellen</span>
                    <span wire:loading>Verwerken...</span>
                </x-button>
            </div>
        </form>
    </div>
</div>
