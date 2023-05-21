<div>
    {{-- Do your work, then step back. --}}
    {{--Display all the products in a form--}}
    <form wire:submit.prevent="submitForm">

        @if (session()->has('message'))
            <div class="bg-green-200 text-2xl">
                {{ session('message') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Maat</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                    <th>Totaal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>
                            <select wire:model="selectedSize.{{ $index }}">
                                <option value="">Selecteer een maat</option>
                                @foreach($this->getSizesForSelectedProduct($product->id, $index) as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>€{{ $product->price }}</td>
                        <td>
                            <input type="number" min="0" max="10" value="{{ $amounts[$product->id] ?? 0 }}" wire:model.debounce.500ms="amounts.{{ $product->id }}">
                        </td>
                        <td>
                            €{{ $this->getTotalForProduct($product->id) ?? 0}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="border-b border-gray-200"></td>
                    </tr>
                    @if (empty($selectedSize[$index]) && !empty($this->getAmount($product->id)))
                        <tr>
                            <td colspan="5" class="text-red-500">
                                Gelieve een maat op te geven.
                            </td>
                        </tr>
                    @elseif (!empty($selectedSize[$index]) && empty($this->getAmount($product->id)))
                        <tr>
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
                    <td>€{{ $this->getTotal() }}</td>
                    {{--TODO make a function for the grand total price. Probably have to put that somewhere too, and adjust the getTotalForProductFunction. :)--}}
                </tr>
        </table>
        <x-button wire:loading.attr="disabled" type="submit">
            <span wire:loading.remove>Bestellen</span>
            <span wire:loading>Submitting...</span>
        </x-button>

    </form>


{{--    --}}{{--Display all the products in a table--}}

</div>
