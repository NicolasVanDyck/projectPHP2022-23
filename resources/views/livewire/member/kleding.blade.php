<div>
    {{-- Do your work, then step back. --}}
    {{--Display all the products in a form--}}
    <form wire:submit.prevent="submitForm">
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Maat</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
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
                            <input type="number" min="0" max="10" value="{{ $amounts[$product->id]}}" wire:model.debounce.500ms="amounts.{{ $product->id }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="border-b border-gray-200"></td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-2">Geen kleding gevonden</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <x-button wire:loading.attr="disabled" type="submit">
            <span wire:loading.remove>Bestellen</span>
            <span wire:loading>Submitting...</span>
        </x-button>

    </form>


{{--    --}}{{--Display all the products in a table--}}

</div>
