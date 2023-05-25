<div>
    {{--Make a datatable where the admin can update the productName, productSizes and Prices--}}
    {{--Also it must be possible to insert new products (with names and sizes--}}
    {{--We can work with a datatable--}}
    <input wire:model="search"
           id="search"
           class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
           placeholder="Search" type="search">


    <table>
        <thead>
            <tr>
                <th class="px-6 py-4 whitespace-no-wrap text-left">Product</th>
                <th class="px-6 py-4 whitespace-no-wrap text-left">Size</th>
                <th class="px-6 py-4 whitespace-no-wrap text-left">Price</th>
                <th class="px-6 py-4 whitespace-no-wrap text-left">Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        @foreach($product->sizes as $size)
                            {{ $size->size }}
                        @endforeach
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium text-indigo-600 hover:text-indigo-900">
                        <button wire:click="update({{ $product->id }})">Update</button>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form wire:submit.prevent="store">
        <input wire:model="productName" type="text" placeholder="Product Name">
        @error('productName') <span>{{ $message }}</span> @enderror

        <input wire:model="productPrice" type="text" placeholder="Product Price">
        @error('productPrice') <span>{{ $message }}</span> @enderror

        <select wire:model="selectedSizes" multiple>
            @foreach($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->size }}</option>
            @endforeach
        </select>
        @error('selectedSizes') <span>{{ $message }}</span> @enderror

        <button type="submit">Add Product</button>
    </form>
</div>
