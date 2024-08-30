<x-layout>
    <section class="grid min-h-screen place-items-center bg-emerald-500 p-16">
        <div class="w-96 rounded-md bg-emerald-300 p-4 pt-0 shadow-lg">
            <div class="flex items-center justify-center h-16 font-bold text-emerald-950">
                <h3 class="text-lg">Book</h3>
            </div>
            <form method="POST" action="{{ route('books.update', $book->id) }}" class="grid gap-3">
                @csrf
                @method('PUT')
                <x-input name="name" type="text" placeholder="Enter book name" :value="$book->name" />
                <x-input name="authors" type="text" placeholder="Enter author names seperated by comma"
                    :value="$authors" />
                <x-input name="publish_date" type="date" placeholder="Enter publish date"
                    :value="$book->publish_date" />
                <div> 
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="h-10 w-full rounded-sm bg-emerald-100/50 px-2 text-emerald-950 placeholder:text-emerald-600/80 focus:outline-none">
                        <option value="available" {{ $book->status === 'available' ? 'selected' : '' }}>
                            Available
                        </option>
                        <option value="occupied" {{ $book->status === 'occupied' ? 'selected' : '' }}>
                            Occupied
                        </option>
                    </select>
                    @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <x-button type="submit" class="bg-emerald-700 px-3 text-emerald-100 hover:bg-emerald-800">
                    <p>Update Book</p>
                </x-button>
            </form>
        </div>
    </section>
</x-layout>