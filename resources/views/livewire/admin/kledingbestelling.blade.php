<div>
    {{--Shows all the order from the orders table, with user name, product name, amount, product size, product price --}}
    <table class="mt-2 mb-10">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Product</th>
                <th>Aantal</th>
                <th>Maat</th>
                <th>Prijs</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
{{--                    @dd($order)--}}
                    <td>dummyname</td>
                    <td>{{ $order->product_size_id }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td> {{ $order->productsize}}</td>
                    <td>dummyprice</td>
                </tr>
            @endforeach
    </table>
</div>
