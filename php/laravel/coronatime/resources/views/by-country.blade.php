<x-navigation>
    <div class="mx-4 md:mx-16 text-2xl font-extrabold">{{ __('dashboard.statistics_by_country') }}</div>
    <div class="mx-4 md:mx-16 flex border-b border-gray-200 mt-10">
        <div class="pb-2">
            <x-active href="{{ route('dashboard.view') }}" :active="request()->routeIs('dashboard.view')">
                {{ __('dashboard.worldwide') }}
            </x-active>
        </div>
        <div class="pb-2 ml-10">
            <x-active href="{{ route('sort.columns', ['name', 'asc']) }}" :active="request()->routeIs('sort.columns')">
                {{ __('dashboard.countries') }}
            </x-active>
        </div>
    </div>
    <div>
        <section class="md:mx-16">
            <div class="mx-4 mt-10">
                <form method="GET" action="#">
                    <div class="relative">
                        <div class="flex absolute items-center mt-4 ml-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" class="block border-2 border-gray-100 rounded-lg pl-10 py-3"
                            name="search" placeholder="Search by country" value="{{ request('search') }}">
                    </div>
                </form>
            </div>


            <table class="mt-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="divide-y flex flex-col  w-full bg-slate-200 text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400">
                    <tr class="grid grid-cols-4">
                        <th class="flex py-3 px-6 align-middle">
                            <div>
                                {{ __('dashboard.countries') }}
                            </div>
                            <div class="ml-1 ">
                                <div class="mb-1 w-3 h-2">
                                    <a class="" href="{{ route('sort.columns', ['name', 'asc']) }}">
                                        <img class="relative top-0" src="{{ asset('/images/arrowUp.svg') }}"
                                            alt="sort">
                                    </a>
                                    <img class="absolute -mt-[6px] h-3 w-3 -ml-[1px] @if ($sort == 'asc' && $column == 'name') block @else hidden @endif"
                                        src="{{ asset('/images/up-arrow.svg') }}" alt="up">
                                </div>
                                <div class="w-3">
                                    <a class="" href="{{ route('sort.columns', ['name', 'desc']) }}">
                                        <img class="relative top-0" src="{{ asset('/images/DownArrow.svg') }}"
                                            alt="sort">
                                    </a>
                                    <img class="absolute -mt-[12px] h-3 w-3 -ml-[1px]  @if ($sort == 'desc' && $column == 'name') block @else hidden @endif"
                                        src="{{ asset('/images/down-arrow.svg') }}" alt="down">
                                </div>
                            </div>
                        </th>
                        <th class="flex py-3 px-6">
                            <div>
                                {{ __('dashboard.new_cases') }}
                            </div>
                            <div class="ml-1">
                                <div class="mb-1 w-3 h-2">
                                    <a class="" href="{{ route('sort.columns', ['new_cases', 'asc']) }}">
                                        <img class="relative top-0" src="{{ asset('/images/arrowUp.svg') }}"
                                            alt="sort">
                                    </a>
                                    <img class="absolute -mt-[6px] h-3 w-3 -ml-[1px] @if ($sort == 'asc' && $column == 'new_cases') block @else hidden @endif"
                                        src="{{ asset('/images/up-arrow.svg') }}" alt="up">
                                </div>
                                <div class="w-3">
                                    <a class="" href="{{ route('sort.columns', ['new_cases', 'desc']) }}">
                                        <img class="relative top-0" src="{{ asset('/images/DownArrow.svg') }}"
                                            alt="sort">
                                    </a>
                                    <img class="absolute -mt-[12px] h-3 w-3 -ml-[1px]  @if ($sort == 'desc' && $column == 'new_cases') block @else hidden @endif"
                                        src="{{ asset('/images/down-arrow.svg') }}" alt="down">
                                </div>
                            </div>
                        </th>
                        <th class="flex py-3 px-6">
                            <div>
                                {{ __('dashboard.recovered') }}
                            </div>
                            <div class="ml-1">
                                <div class="mb-1 w-3 h-2">
                                    <a class="" href="{{ route('sort.columns', ['recovered', 'asc']) }}">
                                        <img class="relative top-0" src="{{ asset('/images/arrowUp.svg') }}"
                                            alt="sort">
                                    </a>
                                    <img class="absolute -mt-[6px] h-3 w-3 -ml-[1px] @if ($sort == 'asc' && $column == 'recovered') block @else hidden @endif"
                                        src="{{ asset('/images/up-arrow.svg') }}" alt="up">
                                </div>
                                <div class="w-3">
                                    <a class="" href="{{ route('sort.columns', ['recovered', 'desc']) }}">
                                        <img class="relative top-0" src="{{ asset('/images/DownArrow.svg') }}"
                                            alt="sort">
                                    </a>
                                    <img class="absolute -mt-[12px] h-3 w-3 -ml-[1px]  @if ($sort == 'desc' && $column == 'recovered') block @else hidden @endif"
                                        src="{{ asset('/images/down-arrow.svg') }}" alt="down">
                                </div>
                            </div>
                        </th>
                        <th class="flex py-3 px-6">
                            <div>
                                {{ __('dashboard.deaths') }}
                            </div>
                            <div class="ml-1">
                                <div class="mb-1 w-3 h-2">
                                    <a class="" href="{{ route('sort.columns', ['deaths', 'asc']) }}">
                                        <img class="relative top-0" src="{{ asset('/images/arrowUp.svg') }}"
                                            alt="sort">
                                    </a>
                                    <img class="absolute -mt-[6px] h-3 w-3 -ml-[1px] @if ($sort == 'asc' && $column == 'deaths') block @else hidden @endif"
                                        src="{{ asset('/images/up-arrow.svg') }}" alt="up">
                                </div>
                                <div class="w-3">
                                    <a class="" href="{{ route('sort.columns', ['deaths', 'desc']) }}">
                                        <img class="relative top-0" src="{{ asset('/images/DownArrow.svg') }}"
                                            alt="sort">
                                    </a>
                                    <img class="absolute -mt-[12px] h-3 w-3 -ml-[1px]  @if ($sort == 'desc' && $column == 'deaths') block @else hidden @endif"
                                        src="{{ asset('/images/down-arrow.svg') }}" alt="down">
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y max-h-96 flex flex-col overflow-y-auto w-full divide-gray-100 bg-white">
                    <tr class="grid grid-cols-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ __('dashboard.worldwide') }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $new_cases }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $recovered }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $deaths }}
                        </td>
                    </tr>
                    @foreach ($countries as $country)
                        <tr class="grid grid-cols-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $country->name }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $country->new_cases }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $country->recovered }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $country->deaths }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</x-navigation>
