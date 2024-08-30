<div class="w-full md:w-1/2">
    <form method="GET" action="#" class="flex items-center">
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <x-icons.search />
            </div>
            <input name="search" type="text" id="search" placeholder="Search books" value="{{request('search')}}"
                class="bg-emerald-100/50 text-emerald-950 placeholder:text-emerald-600/80 focus:outline-none border border-emerald-800 text-sm rounded-lg block w-full pl-10 p-2">
        </div>
    </form>
</div>