<div>
    <x-slot name="title">Mijn bestelling</x-slot>
    <x-slot name="description">Hier kun je zien welke kleding je hebt besteld en eventueel aanpassen</x-slot>

    <h2 class="text-white ml-2 mb-2">Mijn bestelling</h2>

    <div class="flex ml-2">
        <div class="">
            <form wire:submit.prevent="submitForm">
                @csrf
                @if (session()->has('message'))
                    <div class="bg-green-200 text-2xl">
                        {{ session('message') }}
                    </div>
                @endif
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
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
