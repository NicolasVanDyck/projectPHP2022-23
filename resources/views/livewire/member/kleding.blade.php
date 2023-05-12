<div>
    {{-- Do your work, then step back. --}}
    {{--Display all the products in a table--}}
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Maat</th>
            </tr>
        </thead>
        <tbody>
{{--            <div wire:model="products">--}}
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        <select>
                            @foreach($this->getSizesForSelectedProduct($product->id) as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                {{--A very thin separation line--}}
                <tr>
                    <td colspan="4" class="border-b border-gray-200"></td>
                </tr>
            @empty
                <tr>
                    <td class="p-2">Geen kleding gevonden</td>
                </tr>
            @endforelse
{{--            </div>--}}

                {{--{{ $products->links() }--}}
        </tbody>
    </table>
</div>
