<x-layout>
    <section class="bg-emerald-500 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="bg-emerald-300 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-b border-emerald-800">
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{route('books.index')}}">
                            <x-button>
                                Books List
                            </x-button>
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-emerald-950">
                        <thead class="text-xs text-emerald-950 uppercase">
                            <tr>
                                <th scope="col" class="p-4">Author</th>
                                <th scope="col" class="p-4">Pubished books</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                            <x-author-row :author="$author" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-layout>