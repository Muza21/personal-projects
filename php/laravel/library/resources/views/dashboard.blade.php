<x-layout>
    <form method="POST" action="{{ route('logout.user') }}">
        @csrf
        <x-button type="submit">
            <p>Log Out</p>
        </x-button>
    </form>
    <section class="bg-emerald-500 p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="bg-emerald-300 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-b border-emerald-800">
                    <x-search />
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{route('authors.index')}}">
                            <x-button>
                                Authors List
                            </x-button>
                        </a>
                        <a href="{{route('books.create')}}">
                            <x-button>
                                <x-icons.create />
                                Create a Book
                            </x-button>
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <x-books-table :books="$books"/>
                </div>
            </div>
        </div>
    </section>
</x-layout>