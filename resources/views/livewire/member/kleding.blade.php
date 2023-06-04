<div>

{{--    TODO: parameter endDate--}}
    <div class="flex flex-wrap">
        <h2 class="flex-grow text-center underline pb-2 lg:">Plaats hier uw bestelling</h2>
{{--        <td>{{ $parameter->end_date_order }}</td>--}}
    </div>
    <div class="flex">
        <div class="lg:mx-auto">
            <form wire:submit.prevent="submitForm">
                @csrf
                @if (session()->has('message'))
                    <div class="bg-green-200 text-2xl">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table-auto">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th class="hidden sm:table-cell">Maat</th>
                        <th>Prijs</th>
                        <th class="hidden sm:table-cell">Aantal</th>
                        <th>Totaal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $index => $product)
                        <tr>
                            <td class="border-y-2 border-orange-500 sm:border-none md:border-none ">
                                <div>
                                    {{ $product->name }}
                                </div>
                                <div class="sm:hidden ">
                                    <select wire:model="selectedSize.{{ $index }}">
                                        <option value="">Maat</option>
                                        @foreach($this->getSizesForSelectedProduct($product->id, $index) as $size)
                                            <option value="{{ $size->id }}">{{ $size->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="sm:hidden py-4">
                                    <input type="number" class="w-20" min="0" max="10"
                                           value="{{ $amounts[$product->id] ?? 0 }}"
                                           wire:model.debounce.500ms="amounts.{{ $product->id }}">
                                </div>
                            </td>
                            <td class="hidden sm:table-cell ">
                                <select wire:model="selectedSize.{{ $index }}">
                                    <option value="">Selecteer een maat</option>
                                    @foreach($this->getSizesForSelectedProduct($product->id, $index) as $size)
                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="border-collapse border-y-2 border-orange-500 sm:border-none md:border-none">
                                €{{ $product->price }}</td>
                            <td class="hidden sm:table-cell ">
                                <input type="number" min="0" max="10"
                                       value="{{ $amounts[$product->id] ?? 0 }}"
                                       wire:model.debounce.500ms="amounts.{{ $product->id }}">
                            </td>
                            <td class="border-collapse border-y-2 border-orange-500 sm:border-none md:border-none">
                                €{{ $this->getTotalForProduct($product->id) ?? 0}}
                            </td>
                        </tr>
                        @if (empty($selectedSize[$index]) && !empty($this->getAmount($product->id)))
                            <tr class="">
                                <td colspan="5" class="text-red-500">
                                    Gelieve een maat op te geven.
                                </td>
                            </tr>
                        @elseif (!empty($selectedSize[$index]) && empty($this->getAmount($product->id)))
                            <tr class="">
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
                    <tr>
                        <td colspan="4" class="text-right">Totaal</td>
                        <td class="border-collapse border-t-2 border-orange-500 sm:border-none md:border-none">
                            €{{ $this->getTotal() }}</td>
                    </tr>
                    </tfoot>
                </table>
                <div class="flex justify-center mt-4">
                    <x-button wire:loading.attr="disabled" type="submit">
                        <span wire:loading.remove>Bestellen</span>
                        <span wire:loading>Submitting...</span>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
