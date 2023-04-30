{{--<!DOCTYPE html>--}}
{{--Added some comment for testing--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>Laravel</title>--}}
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
{{--</head>--}}
{{--<form>--}}

{{--    <form>--}}
{{--        <div class="grid grid-cols-2 gap-4">--}}
{{--            <div class="col-span-2 md:col-span-1">--}}
{{--                <label for="Firstname" value="Firstname"/>--}}
{{--                <input type="text" id="Firstname" name="Firstname" class="block mt-1 w-full"--}}
{{--                             placeholder="First name"/>--}}
{{--            </div>--}}
{{--            <div class="col-span-2 md:col-span-1">--}}
{{--                <label for="Lastname" value="Lastname"/>--}}
{{--                <input type="text" id="Lastname" name="Lastname" class="block mt-1 w-full"--}}
{{--                       placeholder="Last name"/>--}}
{{--            </div>--}}
{{--            <div class="col-span-2">--}}
{{--                <label for="email" value="Email"/>--}}
{{--                <input type="text" id="name" name="name" placeholder="E-mail adress"--}}
{{--                             class="block mt-1 w-full"/>--}}
{{--            </div>--}}

{{--            <form class="col-span-2 md:col-span-1">--}}
{{--                <label for="vraag">Waar gaat uw vraag over?</label>--}}
{{--                <select name="vraag" id="vraag" class="col-span-2">--}}
{{--                    <option value="volvo">Proef rit</option>--}}
{{--                    <option value="vraag">Vraag</option>--}}
{{--                    <option value="andere">Andere</option>--}}
{{--                </select>--}}
{{--            </form>--}}
{{--            <div class="col-span-2">--}}
{{--                <label for="message" value="Message"/>--}}
{{--                <textarea rows="4" cols="50" class="block mt-1 w-full" placeholder="Stel uw vraag..."></textarea>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--            <div class="text-center">--}}
{{--                <button>send message</button>--}}
{{--            </div>--}}

{{--    </form>--}}


        <div
        class="block max-w-md rounded-lg p-6 dark:bg-gray-800/50">
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
                    >Voor naam
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
                    >Achter naam
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
                >Email address
                </label>
            </div>
            <!--Dropdown-->
            <div class="relative mb-8" data-te-dropdown-ref>
                <button
                    class="flex items-center whitespace-nowrap rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] motion-reduce:transition-none"
                    type="button"
                    id="dropdownMenuMediumButton"
                    data-te-dropdown-toggle-ref
                    aria-expanded="false"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    Wat wilt u vragen?
                    <span class="ml-2 w-2">
                    <svg
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"
                         fill="currentColor"
                        class="h-5 w-5">
                    <path
                fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
      </svg>
        </span>
                </button>
                    <ul
                        class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuMediumButton"
                        data-te-dropdown-menu-ref>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                href="#" data-te-dropdown-item-ref>Action</a>
                    </li>
                    <li>
                        <a
                            class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#" data-te-dropdown-item-ref>Another action</a>
                    </li>
                    <li>
                        <a
                            class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="#"
                            data-te-dropdown-item-ref>Something else here</a>
                    </li>
                </ul>
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
            <button
                type="submit"
                class="inline-block w-full rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                Verstuur</button>
        </form>
    </div>
{{--</form>--}}
