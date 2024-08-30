<x-layout>
    <section class="grid min-h-screen place-items-center bg-emerald-500 p-16">
        <div class="w-96 rounded-md bg-emerald-300 p-4 pt-0 shadow-lg">
            <div class="flex items-center justify-center h-16 font-bold text-emerald-950">
                <h3 class="text-lg">Add a New Book</h3>
            </div>
            <form method="POST" action="{{ route('books.store') }}" class="grid gap-3">
                @csrf

                <x-input name="name" type="text" placeholder="Enter book name" />
                <x-input name="authors" type="text" placeholder="Enter author names seperated by comma" />
                <x-input name="publish_date" type="date" placeholder="Enter publish date" />

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="h-10 w-full mb-8 rounded-sm bg-emerald-100/50 px-2 text-emerald-950 placeholder:text-emerald-600/80 focus:outline-none">
                        <option value="available">Available</option>
                        <option value="occupied">Occupied</option>
                    </select>
                    @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <x-button type="submit" class="bg-emerald-700 px-3 text-emerald-100 hover:bg-emerald-800">
                    <p>Create</p>
                </x-button>
            </form>
        </div>
    </section>
</x-layout>