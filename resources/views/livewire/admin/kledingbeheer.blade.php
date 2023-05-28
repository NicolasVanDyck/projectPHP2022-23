<div>
{{--    <input wire:model="search"
           id="search"
           class="mt-2 w-1/8 pr-3 border border-gray-300 rounded-md bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
           placeholder="Search" type="search">--}}

    {{-- Detail section --}}
    <section class="mb-4 flex items-center align-middle justify-between">
        <x-button wire:click="setNewProduct()" class="flex-initial w-10">
            Product toevoegen
        </x-button>
        <div class="grow">
            <x-input id="search" type="text" name="search"
                     placeholder="Zoek een product"
                     wire:model.debounce.500ms="search"
                     autofocus autocomplete="search"
                     class="flex-initial w-[20%] mt-1 mx-auto"/>
        </div>
{{--        <div class="mr-5">{{$products->links()}}</div>--}}
    </section>

    <table class="mt-2">
        <thead>
            <tr class="[&>th]:p-2 px-6 py-4 whitespace-no-wrap text-left bg-white">
                <th wire:click="sortBy('name')" class="hover:cursor-pointer">Product</th>
                <th>Maten</th>
                <th wire:click="sortBy('price')" class="hover:cursor-pointer">Prijs</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="border-t border-gray-300 [&>td]:p-2 px-6 py-4 text-left hover:bg-white"
                    wire:key="product-{{ $product->id }}">
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        @foreach($product->sizes as $size)
                            {{--if not the last product end with a ,--}}
                            @if(!$loop->last)
                                {{ $size->size . ', '}}
                                @continue
                            @endif
                            {{ $size->size}}
                        @endforeach
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td class="flex gap-1 justify-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">
                        <x-heroicon-m-pencil class="w-5 h-5 hover:fill-blue-500 ml-2" wire:click="setNewProduct({{$product->id}})"/>
                        <x-heroicon-m-trash class="w-5 h-5 hover:fill-red-500 ml-2" wire:click="delete({{$product->id}})" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal section --}}
    @include('components.wd_components.modalkledingbeheer')
</div>
