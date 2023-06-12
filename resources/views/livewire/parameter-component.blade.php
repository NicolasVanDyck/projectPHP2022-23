<div>
    <div class="sm:ml-7 sm:mr-7 mb-6 sm:mb-10 mt-6 @container">
        <div class="flex flex-col @md:justify-evenly">
            <div>
                @if (session()->has('message'))
                    <div>{{ session('message') }}</div>
                @endif


                <form wire:submit.prevent="update"
                      class="md:mx-auto bg-[#e6ebef] w-full @lg:w-[75%] @xl:w-[50%]">
                    <p class="text-[#617691] p-2 text-sm @md:text-md font-bold">Huidige einddatum: {{ $this->getEndDateOrder() }}</p>
                    <div class="flex flex-row">
                        <div class="flex flex-row justify-center m-2 ">
                            <input type="date" name="end_date_order" id="end_date_order"
                                   class="border border-rounded-md border-gray-400 text-xs @md:text-md"
                                   wire:model.defer="end_date_order">
                        </div>
                        <x-button class="p-2 m-2 text-white flex flex-row
                                 @sm:mb-2 @sm:w-fit @sm:h-fit w-[80px]
                                 h-[80px]"
                                  type="submit">
                            <p class="@sm:visible collapse">Verander einddatum</p>
                            <x-heroicon-m-calendar-days
                                class="@sm:ml-1 @sm:h-6 @sm:w-6 @sm:mx-0 @sm:my-0
                               h-10 w-10 mx-auto my-auto
                               "/>
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




