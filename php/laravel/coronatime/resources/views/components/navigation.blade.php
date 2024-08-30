<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    @vite('resources/css/app.css')
</head>

<body>
    <nav class="mt-3 mb-10">
        <div class="px-4 md:px-24 flex flex-wrap justify-between items-center mx-auto">
            <img src="{{ asset('images/Group 1.svg') }}" alt="coronatime">

            <button data-collapse-toggle="mobile-menu" type="button"
                class="inline-flex justify-center items-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-500"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div id="mobile-menu" class="hidden mt-36 md:mt-0 absolute md:static w-full md:block md:w-auto">
                <ul
                    class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                    <li x-data="{ show: false }" @click.away="show = false" class="relative">
                        <button @click="show = !show"
                            class="flex justify-between items-center text-xl py-2 pr-4 pl-3 w-full font-medium text-gray-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                            {{ 'en' === app()->currentLocale() ? __('dashboard.english') : __('dashboard.georgian') }}
                            <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="show"
                            class="py-2 absolute bg-gray-100 w-full md:w-24 border border-gray-200 rounded-xl z-50 overflow-auto max-h-52"
                            style="display: none">
                            <x-dropdown-item href="{{ route('locale.change', 'en') }}">
                                {{ __('dashboard.english') }}
                            </x-dropdown-item>
                            <x-dropdown-item href="{{ route('locale.change', 'ka') }}">
                                {{ __('dashboard.georgian') }}
                            </x-dropdown-item>
                        </div>
                    </li>
                    <li>
                        <div class="pr-7 border-r text-xl hidden md:block">
                            <h3 class="text-xl font-bold">{{ ucwords(auth()->user()->username) }}</h3>
                        </div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout.user') }}">
                            @csrf
                            <div class="border-gray-200 text-xl">
                                <button
                                    class="flex justify-between items-center text-xl  pl-3 w-full font-medium text-gray-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto"
                                    type="submit">{{ __('dashboard.log_out') }}</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="md:mx-8">
        {{ $slot }}

    </div>
</body>

</html>
