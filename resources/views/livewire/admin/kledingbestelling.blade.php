<div>
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
{{--            @foreach($orders as $order)--}}
{{--                <tr class="border-t border-gray-300 [&>td]:p-2 px-6 py-4 text-left hover:bg-white hover:text-black">--}}
{{--                    <td>--}}
{{--                        {{ $this->getUserNameFromOrder($order) }}--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        {{ $this->getProductNameFromOrder($order) }}--}}
{{--                    </td>--}}
{{--                    <td>{{ $order->quantity }}</td>--}}
{{--                    <td> {{ $this->getSizeNameFromOrder($order)}}</td>--}}
{{--                    <td>€ {{ $this->getTotalForProduct($order) }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--@dd($ordersCollection)--}}
            @foreach($ordersCollection as $order)
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
        <h3 class="text-lg m-2">Download naar Excel</h3>
        <x-button wire:click="exportToExcel" class="m-2">Download</x-button>
    </div>
</div>
