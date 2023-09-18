<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-10">
    {{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" /> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/bg.png')}}" class="w-20 mt-1" alt="">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('messages.dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('banjir')" :active="request()->routeIs('banjir')">
                        {{ __('messages.flood') }}
                    </x-nav-link>
                    <x-nav-link :href="route('suhu')" :active="request()->routeIs('suhu')">
                        {{ __('messages.temp') }}
                    </x-nav-link>
                    <x-nav-link :href="route('kelembapan')" :active="request()->routeIs('kelembapan')">
                        {{ __('messages.humidity') }}
                    </x-nav-link>
                    <x-nav-link :href="route('hujan')" :active="request()->routeIs('hujan')">
                        {{ __('messages.rain') }}
                    </x-nav-link>

                    <div class="relative inline-block text-left">

                        <button type="button"
                            class="inline-flex justify-center bg-gray-200 text-gray-500 w-30 rounded-md mt-[15px] hover:text-gray-700 px-4 py-2 text-sm font-medium hover:bg-gray-300 transition ease-in-out duration-300 focus:outline-none focus:ring-offset-1"
                            id="dropdown-button" aria-haspopup="true" aria-expanded="true">
                            <img class="-mr-1 ml-2 h-5 w-5 inline mr-3" src="{{ asset('images/translate.png') }}" </img>
                            Language

                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6.293 6.293a1 1 0 011.414 0L10 8.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden"
                            id="dropdown-menu">
                            <div class="py-1" role="menu" aria-orientation="vertical"
                                aria-labelledby="dropdown-button">



                                <a href="{{ url('/en') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    role="menuitem">
                                    <img class="-mr-1 ml-2 h-5 w-5 inline mr-3" src="{{ asset('images/uk.png') }}"</img>
                                    {{ __('messages.english') }}
                                </a>
                                <a href="{{ url('/id') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    role="menuitem">
                                    <img class="-mr-1 ml-2 h-5 w-5 inline mr-3"
                                        src="{{ asset('images/indonesia.png') }}" </img>
                                    {{ __('messages.indonesia') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <script>
                        const dropdownButton = document.getElementById('dropdown-button');
                        const dropdownMenu = document.getElementById('dropdown-menu');
                        let isDropdownOpen = false;

                        dropdownButton.addEventListener('click', () => {
                            isDropdownOpen = !isDropdownOpen;
                            if (isDropdownOpen) {
                                dropdownMenu.classList.remove('hidden');
                                dropdownMenu.classList.add('block');
                                setTimeout(() => {
                                    dropdownMenu.classList.remove('opacity-0', 'scale-95');
                                    dropdownMenu.classList.add('opacity-100', 'scale-100', 'transition', 'duration',
                                        'ease-in-out');
                                }, 90);
                            } else {
                                dropdownMenu.classList.remove('opacity-100', 'scale-100');
                                dropdownMenu.classList.add('opacity-0', 'scale-95');
                                setTimeout(() => {
                                    dropdownMenu.classList.remove('block');
                                    dropdownMenu.classList.add('hidden');
                                }, 200);
                            }
                        });

                        // Close the dropdown if the user clicks outside
                        window.addEventListener('click', (event) => {
                            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                isDropdownOpen = false;
                                dropdownMenu.classList.remove('opacity-100', 'scale-100');
                                dropdownMenu.classList.add('opacity-0', 'scale-95');
                                setTimeout(() => {
                                    dropdownMenu.classList.remove('block');
                                    dropdownMenu.classList.add('hidden');
                                }, 300);
                            }
                        });
                    </script>
                </div>
            </div>

            <!-- Settings Dropdown -->

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-3 py-2 mt-1 border border-transparent text-sm leading-4 font-medium text-gray-500 hover:bg-gray-50 focus:outline-none focus:ring-offset-1 rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                            @if (auth()->check())
                                {{ auth()->user()->name }}
                            @endif


                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            <img class=" ml-2 h-3 w-3 mr-2 mb-1 inline" src="{{ asset('images/user.png') }}" </img>
                            {{ __('messages.profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('settings.index')">
                            <img class=" ml-2 h-3 w-3 mr-2 mb-1 inline" src="{{ asset('images/settings.png') }}" </img>
                            {{ __('messages.setting') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link onclick="event.preventDefault(); this.closest('form').submit();">
                                <img class=" ml-2 h-3 w-3 mr-2 mb-1 inline" src="{{ asset('images/logout.png') }}"
                                    </img>
                                {{ __('messages.logout') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('messages.dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('banjir')" :active="request()->routeIs('banjir')">
                {{ __('messages.flood') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('suhu')" :active="request()->routeIs('suhu')">
                {{ __('messages.temp') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kelembapan')" :active="request()->routeIs('kelembapan')">
                {{ __('messages.humidity') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('hujan')" :active="request()->routeIs('hujan')">
                {{ __('messages.rain') }}
            </x-responsive-nav-link>

        </div>



        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            <!-- Access user-related data here, such as user name -->
            @auth <!-- Check if the user is authenticated -->
                <!-- Access user-related data here, such as user name -->
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            @endauth






            <div class="mt-3 space-y-1">
                {{-- <x-responsive-nav-link :href="route('language.index')">
                    {{ __('messages.language') }}
                </x-responsive-nav-link> --}}
                <x-responsive-nav-link :href="route('settings.index')">
                    {{ __('messages.setting') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('messages.profile') }}
                </x-responsive-nav-link>


                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('messages.logout') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

    </div>
</nav>
