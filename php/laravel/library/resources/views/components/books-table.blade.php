<table class="w-full text-sm text-left text-emerald-950">
    <thead class="text-xs text-emerald-950 uppercase">
        <tr>
            <th scope="col" class="p-4">Book</th>
            <th scope="col" class="p-4">Author</th>
            <th scope="col" class="p-4">Publish Date</th>
            <th scope="col" class="p-4">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <x-book-row :book="$book" />
        @endforeach
    </tbody>
</table>