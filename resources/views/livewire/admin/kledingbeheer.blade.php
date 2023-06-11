<div>
    {{-- Detail section --}}

    <div class="sm:ml-7 sm:mr-7 @container mb-4">
        <div class="mt-4 flex flex-row justify-center m-2">
            <x-button wire:click="showModal()" class="@sm:mb-2 p-2 text-white flex flex-row @sm:w-fit @sm:h-fit w-[60px] h-[60px] mr-2 ml-1">
                <p class="collapse @sm:visible text-center my-auto">Product toevoegen</p>
                <x-heroicon-m-plus-circle class="@sm:ml-1 @sm:h-8 @sm:w-8 h-10 w-10 mx-auto my-auto @sm:mx-0 @sm:my-0"/>
            </x-button>
            <div>
                <x-input id="search" type="text" name="search"
                         placeholder="Zoeken..."
                         wire:model.debounce.500ms="search"
                         autofocus autocomplete="search"
                         class="flex-initial w-[90%] @sm:w-auto mx-auto @sm:mb-2 p-2"/>
            </div>
        </div>

        {{-- Table section --}}
        <table class="table-auto md:mx-auto bg-[#e6ebef] shadow-2xl @md:rounded-md w-full @xl:w-auto">
            <thead class="text-left bg-[#cdd6df] overflow-hidden">
                <tr class="[&>th]:text-[#192c44] [&>th]:p-4 text-sm @lg:text-md">
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
                        <td class="text-[#617691] p-2 text-sm @lg:text-md">
                            {{ $product->name }}
                        </td>
                        <td class="text-[#617691] p-2 text-sm @lg:text-md">
                            @foreach($product->sizes as $size)
                                @if(!$loop->last)
                                    {{ $size->size . ', '}}
                                    @continue
                                @endif
                                {{ $size->size}}
                            @endforeach
                        </td>
                        <td class="text-[#617691] p-2 text-sm @lg:text-md">
                            €{{ $product->price }}
                        </td>
                        <td class="flex gap-1 justify-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">
                            <x-heroicon-m-pencil class="w-4 h-4 hover:fill-blue-500 ml-2 my-5" wire:click="setNewProduct({{$product->id}})"/>
                            <x-heroicon-m-trash class="w-4 h-4 hover:fill-red-500 ml-2 my-5"
                                                x-data=""
                                                @click="$dispatch('swal:confirm', {
                                          html: 'Verwijder {{ $product->name }}?',
                                          confirmButtonText: 'Verwijder dit kledingstuk',
                                          next: {
                                          event: 'delete-product',
                                          params: {
                                          id: {{ $product->id }},
                                          }
                                          }
                                          })" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Modal section --}}
    @include('components.wd_components.modalkledingbeheer')
    @include('components.wd_components.kledingbeheererrormodal')
</div>
