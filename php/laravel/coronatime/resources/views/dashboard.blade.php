<x-navigation>
    <div class="mx-4 md:mx-16 text-2xl font-extrabold">{{ __('dashboard.worldwide_statistics') }}</div>
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
        <section class="mx-auto">
            <div class="md:mx-10 md:mt-14">
                <div class="grid grid-cols-2 md:grid-cols-3 mt-4 md:mt-20 mb-10">
                    <div class='bg-blue-50 hover:bg-blue-100 col-span-2 md:col-span-1 border rounded-xl ml-5 mr-5 mt-4'>
                        <div class="py-6 px-5">
                            <div class="mt-8 flex flex-col items-center justify-between">
                                <div class="h-14">
                                    <img src="{{ asset('/images/Group 1797.svg') }}" alt="chart" class="rounded-xl">
                                </div>


                                <div class="text-xl mt-4">
                                    {{ __('dashboard.new_cases') }}
                                </div>

                                <div>
                                    <h5 class="font-bold text-4xl text-blue-700 items-center mt-8">
                                        {{ $new_cases }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='bg-green-50 hover:bg-green-100 border rounded-xl ml-5 md:mr-5 mr-2 mt-4'>
                        <div class="py-6 px-5">
                            <div class="mt-8 flex flex-col items-center justify-between">
                                <div class="h-14">
                                    <img src="{{ asset('/images/Group 1799.svg') }}" alt="chart" class="">
                                </div>


                                <div class="text-xl mt-4">
                                    {{ __('dashboard.recovered') }}
                                </div>

                                <div>
                                    <h5 class="font-bold text-4xl text-green-600 items-center mt-8">
                                        {{ $recovered }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='bg-yellow-50 hover:bg-yellow-100 border rounded-xl ml-2 md:ml-5 mr-5 mt-4'>
                        <div class="py-6 px-5">
                            <div class="mt-8 flex flex-col items-center justify-between">
                                <div class="h-14">
                                    <img src="{{ asset('/images/Group 1798.svg') }}" alt="chart" class="rounded-xl">
                                </div>


                                <div class="text-xl mt-4">
                                    {{ __('dashboard.deaths') }}
                                </div>

                                <div>
                                    <h5 class="font-bold text-4xl text-yellow-300 items-center mt-8">
                                        {{ $deaths }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-navigation>
