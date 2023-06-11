<div>
    <x-slot name="title">Mijn bestelling</x-slot>
    <x-slot name="description">Hier kun je zien welke kleding je hebt besteld en eventueel aanpassen</x-slot>


    <div class="flex flex-col ml-2 mt-20">
        <div class="flex-ml-2 mx-auto">
            <div class="text-white flex flex-row text-2xl font-semibold mb-10">
                <div class="col-span-1"></div>
                Mijn bestelling
                <x-heroicon-m-information-circle
                    wire:click="myOrderInfoModal"
                    class="w-10 h-10 fill-green-300 hover:fill-green-500 ml-2 hover:cursor-pointer self-center"
                />
            </div>

            <table class="table-auto">
                <thead class="text-white">
                <tr class="[&>th]:p-2 px-6 py-4 whitespace-no-wrap text-left">
                    <th>Naam</th>
                    <th class="hidden sm:table-cell">Maat</th>
                    <th>Prijs</th>
                    <th class="hidden sm:table-cell">Aantal</th>
                    <th>Totaal</th>
                </tr>
                </thead>
                <tbody class="text-white">
                    @foreach($orders as $order)
                        <tr class="border-t border-gray-300 [&>td]:p-2 px-6 py-4 text-left hover:bg-white hover:text-black">
                            <td>{{ $this->getProductsFromOrder($order->product_size_id) }}</td>
                            <td>{{ $this->getSizeFromProductSize($order->product_size_id) }}</td>
                            <td>€ {{$this->getPriceFromOrder($order->product_size_id)}}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $this->returnTotalPrice($order->product_size_id, $order->quantity) }}</td>
                            <td>
                                <x-heroicon-m-trash class="w-5 h-5 text-red-500 hover:text-red-700 cursor-pointer" wire:click="deleteOrder({{ $order->id }})"/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex flex-row text-white ml-2 border-t border-t-white">
                <div class="mt-4 text-lg font-semibold">
                    Totaal: € {{ $sumOfOrders }}
                </div>
            </div>



        </div>

        <div class="flex flex-col mt-10 ml-2">
            <p class="text-left pb-2 text-white m-2">Order aanpassen? Ga dan terug naar kleding bestellen. Gebruik het menu kleding of klik op de knop hieronder</p>
            <x-button
                class="text-center pb-2 text-white mt-2 mb-2"
                wire:click="redirectToOrder">
                Ga terug
            </x-button>
        </div>

    </div>


</div>
