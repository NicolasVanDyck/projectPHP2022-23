<div>
    {{--Make a datatable where the admin can update the productName, productSizes and Prices--}}
    {{--Also it must be possible to insert new products (with names and sizes--}}
    {{--We can work with a datatable--}}

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Size</th>
                <th>Price</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <input type="text" wire:model="products.{{ $product->id}}.name">
                    </td>
                    <td>
                        <input type="text" wire:model="products.{{ $product->size}}.size">
                    </td>
                    <td>
                        <label>
                            <input type="text" wire:model="products.{{ $product->id }}.price">
                        </label>
                    </td>
                    <td>
                        <button wire:click="update({{ $product->id }})">Update</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
