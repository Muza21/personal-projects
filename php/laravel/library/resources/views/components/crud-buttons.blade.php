<div class="flex justify-end items-center space-x-4">
    <a href="{{route('books.edit', $book->id)}}">
        <x-button class="bg-blue-700 text-white hover:text-blue-700 hover:bg-white">
            <x-icons.edit />
        </x-button>
    </a>
    <a href="{{route('books.show', $book->id)}}">
        <x-button class="text-emerald-50 bg-emerald-700 hover:bg-emerald-50 hover:text-emerald-700">
            <x-icons.show />
        </x-button>
    </a>
    <form method="POST" action="{{route('books.destroy', $book->id)}}">
        @csrf
        @method('DELETE')
        <x-button type="submit" class="text-white bg-red-800 hover:bg-white hover:text-red-700">
            <x-icons.delete />
        </x-button>
    </form>
</div>