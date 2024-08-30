<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coronatime</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
    <section class="relative flex flex-wrap md:h-screen align-middle">

        <div class="w-full px-4 mt-12 md:mt-16 md:w-2/3 md:px-28">
            <div class="flex justify-between">
                <img src="{{ asset('images/Group 1.svg') }}" alt="coronatime">
                <div>

                    <div x-data="{ show: false }" @click.away="show = false" class="relative">
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
                    </div>

                </div>
            </div>

            {{ $slot }}
        </div>
        <div class="relative w-0 flex-1 lg:block md:flex bg-gradient-to-tr i justify-around items-center hidden">
            <div class="ml-auto">
                <img class="absolute top-0 bottom-0 right-0 h-full object-cover"
                    src="{{ asset('images/covid-19.png') }}" alt="vaccine">
            </div>
        </div>
    </section>
</body>

</html>
