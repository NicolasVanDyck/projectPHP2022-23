<div>
    <x-slot name="title">Mijn bestelling</x-slot>
    <x-slot name="description">Hier kun je zien welke kleding je hebt besteld en eventueel aanpassen</x-slot>


    <div class="mt-20 @container">
        <div class="@md:ml-0 @md:-mt-10">
            <div class="text-white flex flex-row text-2xl font-semibold mb-10 @md:text-black @md:mt-10 @md:ml-2">
                <div class="text-[#ffffff] ml-2 underline underline-offset-8">Mijn bestelling</div>
                <x-heroicon-m-information-circle
                    wire:click="myOrderInfoModal"
                    class="w-10 h-10 fill-green-200 hover:fill-green-100 ml-2 hover:cursor-pointer self-center transform sm:hover:scale-110"
                />
            </div>

            <div class="@container">
                <div class="mr-2 ml-2
                            @4xl:grid-cols-4 @4xl:gap-4 @4xl:min-w-[500px]
                            @2xl:grid-cols-3 @2xl:gap-4 @2xl:max-w-[100%]
                            @xl:grid-cols-2 @xl:gap-4 @xl:max-w-[100%]
                             @lg:grid-cols-1 @lg:gap-4 @lg:max-w-[90%]
                            grid grid-cols-1 gap-4 text-grey text-lg max-w-[90%] @md:max-w-[100%]
                            @md:text-lg @sm:text-md">
                    @foreach($orders as $order)
                        <div class="bg-gradient-to-r from-[#b5c2cf] p-[1px] to-[#517090] rounded-md">
                            <div class="min-h-[3rem] shadow-xl p-2 relative flex flex-col
                                    rounded-md bg-[#041f3a]
                                    @md:min-h-[175px]
                                    {{--bg-gradient-to-bl from-[#041f3a] to-[#073360]--}}
                                    bg-[#e6ebef]
                                    ">
                                <span class="text-[#192c44] text-sm @md:text-md">{{ $this->getProductsFromOrder($order->product_size_id) }}</span>
                                <span class="text-[#617691] @md:text-md text-sm">{{ $this->getSizeFromProductSize($order->product_size_id) }} * {{ $order->quantity }}</span>

                                <div class=" @md:mt-4 mt-10 flex flex-row">
                                    <span class="absolute bottom-1 text-[#617691] text-sm @md:text-md ">totaal: € {{$this->getPriceFromOrder($order->product_size_id)}} </span>
                                    <x-heroicon-m-trash class="w-6 h-6 m-2
                                                           absolute bottom-0 right-0 ml-2 text-red-700 hover:text-red-500 cursor-pointer" wire:click="deleteOrder({{ $order->id }})"/>
                                </div>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="flex flex-row text-white ml-2 @container">
                <div class="mt-4 font-semibold text-md @md:text-lg">
                    Totaal: € {{ $this->sumOfOrders($orders) }}
                </div>
            </div>

            <div class="flex flex-col mt-10">
                <p class="text-left pb-2 text-white m-2">Order aanpassen? Ga dan terug naar kleding bestellen. Gebruik het menu kleding of klik op de knop hieronder</p>
                <x-button
                    class="text-center pb-2 text-white mt-2 mb-2 ml-2 "
                    wire:click="redirectToOrder">
                    Ga terug
                </x-button>
            </div>
        </div>
    </div>





    @include('components.wd_components.mijnbestellinginfomodal')
</div>
