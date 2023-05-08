<!-- Main navigation container -->
<div
        class="flex-no-wrap relative flex w-full items-center justify-between bg-white py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4"
        data-te-navbar-ref>

    <h1 class="flex-grow ml-4">De Wezeldrivers</h1>
    <div class="flex flex-wrap items-center justify-end px-3">

        {{--        Hier kan nog een logo komen later, indien gewenst! --}}
        {{--        <a--}}
        {{--                class="mb-4 mr-2 mt-3 flex-grow items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"--}}
        {{--                href="#">--}}
        {{--            <img--}}
        {{--                    src="https://tecdn.b-cdn.net/img/logo/te-transparent-noshadows.webp"--}}
        {{--                    style="height: 15px"--}}
        {{--                    alt=""--}}
        {{--                    loading="lazy" />--}}
        {{--        </a>--}}

        <!-- Hamburger button for mobile view -->
        <button
                class="block border-0 bg-transparent px-2 text-black hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                type="button"
                data-te-collapse-init
                data-te-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <!-- Hamburger icon -->
            <span class="[&>svg]:w-7">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="h-7 w-7">
          <path
                  fill-rule="evenodd"
                  d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                  clip-rule="evenodd" />
            </svg>
            </span>
        </button>

        <!-- Collapsible navigation container -->
        <div
                class="!visible hidden flex basis-[100%] items-center lg:!flex lg:basis-auto"
                id="navbarSupportedContent1"
                data-te-collapse-item>

            <!-- Left navigation links -->
            <ul
                    class="list-style-none flex flex-grow flex-col lg:flex-row items-end"
                    data-te-navbar-nav-ref>
                <x-button>
                    <li class="lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <!-- Dashboard link -->
                        <a
                                href="{{route('home')}}"
                                data-te-nav-link-ref
                        >Home</a
                        >
                    </li>
                </x-button>

                <!-- Team link -->
                <x-button>
                    <li class="lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a
                                href="{{route('contact')}}"
                                data-te-nav-link-ref
                        >Contact</a
                        >
                    </li>
                </x-button>

                <!-- Projects link -->
                <x-button bgcolor="rood">
                    <li class="lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a
                                href="{{route('login')}}"
                                data-te-nav-link-ref
                        >Login</a
                        >
                    </li>
                </x-button>
            </ul>
        </div>
    </div>

</div>