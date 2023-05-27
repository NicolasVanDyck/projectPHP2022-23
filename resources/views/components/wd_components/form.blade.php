<div
    class="block max-w-md rounded-lg p-6  bg-white rounded-3xl">

    <form>
        <div class="grid grid-cols-2 gap-4">
            <!--First name input-->
            <div class="relative mb-6" data-te-input-wrapper-init>
                <input type="text"
                       class="peer block min-h-[auto]  w-full rounded border-0 bg-white px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:text-black data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                       id="exampleInput123"
                       aria-describedby="emailHelp123"
                       placeholder="First name"/>
                <label
                    for="emailHelp123"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.9] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                >Voornaam
                </label>
            </div>

            <!--Last name input-->
            <div class="relative mb-6" data-te-input-wrapper-init>
                <input
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-white px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="exampleInput124"
                    aria-describedby="emailHelp124"
                    placeholder="Last name" />
                <label
                    for="exampleInput124"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                >Achternaam
                </label>
            </div>
        </div>

        <!--Email input-->
        <div class="relative mb-6" data-te-input-wrapper-init>
            <input
                type="email"
                class="peer block min-h-[auto] w-full rounded border-0 bg-white px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleInput125"
                placeholder="Email address" />
            <label
                for="exampleInput125"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
            >E-mailadres
            </label>
        </div>
        <!--Dropdown-->

        <div class="relative mb-6">
            <select data-te-select-init  data-te-select-size="lg" >
                <option value="1"><li><a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                         href="#" data-te-dropdown-item-ref>Proefrit</a></li></option>

                <option value="2"><li><a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                         href="#" data-te-dropdown-item-ref>Vraag</a></li></option>

                <option value="3"><li><a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                         href="#" data-te-dropdown-item-ref>Andere</a></li></option>

            </select>
            <label data-te-select-label-ref >Wat wilt u vragen?</label>
        </div>


        <!--Message textarea-->
        <div class="relative mb-6" data-te-input-wrapper-init>
        <textarea
            class="peer block min-h-[auto] w-full rounded border-0 bg-white px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            id="exampleFormControlTextarea13"
            rows="3"
            placeholder="Message"></textarea>
            <label
                for="exampleFormControlTextarea13"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-black peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
            >Type hier uw vraag
            </label>
        </div>

        <!--Submit button-->
        <x-button
            type="submit"
            class="w-full">
            Verstuur</x-button>
{{--        <a href = "mailto: abc@example.com" class="">Send Email</a>--}}
</div>


