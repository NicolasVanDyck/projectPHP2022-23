<div>

    <div class="sm:ml-7 sm:mr-7 sm:mb-10 @container">

        <div class="mt-4 flex flex-row justify-center m-2">
            <p class="text-[#ffffff] my-auto ml-2 underline underline-offset-8 collapse @sm:visible">meer info</p>
            <x-heroicon-m-information-circle
                class="w-10 h-10 fill-green-200 hover:fill-green-100
                       ml-2 hover:cursor-pointer self-center transform sm:hover:scale-110"
                wire:click="showInfoModal()"
            />
        </div>

        <div class="flex flex-col @md:justify-evenly">
            <table class="table-auto md:mx-auto bg-[#e6ebef] shadow-2xl w-full @xl:w-auto">
                <thead class="text-left bg-[#cdd6df] overflow-hidden">
                <tr class="collapse @sm:visible
                           [&>th]:text-[#192c44] [&>th]:p-4 text-sm @lg:text-md">
                    <th>Naam</th>
                    <th>Product</th>
                    <th>Aantal</th>
                    <th>Maat</th>
                    <th>Prijs</th>
                </tr>
                <tr class="[&>th]:text-[#192c44] [&>th]:p-4 text-sm @lg:text-md
                           visible @sm:collapse border border-b-1">
                    <th colspan="4">
                        <div class="text-center -ml-9">Bestellingen</div>
                    </th>
                </tr>
                <tr class="[&>th]:text-[#192c44] [&>th]:p-4 text-sm @lg:text-md
                           visible @sm:collapse [&>th]:@sm:collapse">
                    <th>Bestelling</th>
                    <th>Maat</th>
                    <th colspan="2">Totaal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ordersCollection->sortBy('user_name') as $order)
                    <tr class="
                        collapse @sm:visible
                        [&>td]:p-2 [&>td]:border-y [&>td]:border-[#d4dde9]">
                        <td>
                            <div class="text-[#617691] p-2 text-xs @md:text-md">
                            {{ $order['user_name'] }}
                            </div>
                        </td>
                        <td>
                            <div class="text-[#617691] p-2 text-xs @md:text-md">
                            {{ $order['product_name'] }}
                            </div>
                        </td>
                        <td>
                            <div class="text-[#617691] p-2 text-xs @md:text-md">
                                {{ $order['amount'] }}
                            </div>
                        </td>
                        <td>
                            <div class="text-[#617691] p-2 text-xs @md:text-md">
                                {{ $order['size_name']}}
                            </div>
                        </td>
                        <td>
                            <div class="text-[#617691] p-2 text-xs @md:text-md">
                                € {{ $order['price'] * $order['amount'] }}
                            </div>
                        </td>
                    </tr>
                    <tr class="[&>td]:p-2 [&>td]:border-y [&>td]:border-[#d4dde9] visible @sm:collapse">
                        <td>
                            <div class="text-[#617691] p-2 text-xs @md:text-md @lg:text-md">
                                {{ $order['user_name'] }} - {{ $order['product_name'] }} * {{ $order['amount'] }}
                            </div>
                        </td>
                        <td>
                            <div class="text-[#617691] p-2 text-xs @md:text-md @lg:text-md">
                                {{ $order['size_name']}}
                            </div>
                        </td>
                        <td>
                            <div class="text-[#617691] p-2 text-xs @md:text-md @lg:text-md">
                                € {{ $order['price'] * $order['amount'] }}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4 flex flex-row justify-center m-2">
                <x-button wire:click="exportToExcel"
                          class="p-2 text-white flex flex-row
                                 @sm:mb-2 @sm:w-fit @sm:h-fit w-[80px]
                                 bg-green-700 hover:bg-green-100
                                 h-[80px]"
                >
                    <p class="@sm:visible collapse">Download naar Excel</p>
                    <x-heroicon-m-document-arrow-down
                        class="@sm:ml-1 @sm:h-6 @sm:w-6 @sm:mx-0 @sm:my-0
                               h-10 w-10 mx-auto my-auto
                               "/>
                </x-button>
            </div>

        </div>
        {{--Shows all the order from the orders table, with user name, product name, amount, product size, product price --}}
    </div>



    @include('components.wd_components.kledingbestellinginfomodal')
</div>
