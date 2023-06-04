<div>
    <div class="flex md:mb-6 md:mt-6">
        <x-heroicon-m-information-circle
            class="w-5 h-5 hover:fill-blue-500 ml-2 hover:cursor-pointer self-center"
            wire:click="showInfoModal()"
        />
        <p class="ml-2 self-center text-sm">meer info</p>
    </div>


    {{--Shows all the order from the orders table, with user name, product name, amount, product size, product price --}}
    <table class="mt-2 mb-10">
        <thead class="">
            <tr class="[&>th]:p-2 px-6 py-4 whitespace-no-wrap text-left bg-[#0e3360]">
                <th>Naam</th>
                <th>Product</th>
                <th>Aantal</th>
                <th>Maat</th>
                <th>Prijs</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordersCollection->sortBy('user_name') as $order)
                <tr class="border-t border-gray-300 [&>td]:p-2 px-6 py-4 text-left hover:bg-white hover:text-black">
                    <td>
                        {{ $order['user_name'] }}
                    </td>
                    <td>
                        {{ $order['product_name'] }}
                    </td>
                    <td>{{ $order['amount'] }}</td>
                    <td> {{ $order['size_name']}}</td>
                    <td>€ {{ $order['price'] * $order['amount'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="border-2 flex-grow-0 max-w-[20%] mb-10">
        <h3 class="text-lg m-2 text-black">Download naar Excel</h3>
        <x-button wire:click="exportToExcel" class="m-2">Download</x-button>
    </div>

    @include('components.wd_components.kledingbestellinginfomodal')
</div>
