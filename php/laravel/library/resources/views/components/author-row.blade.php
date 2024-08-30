<tr class="border-b border-emerald-800 hover:bg-emerald-400">
    <th scope="row" class="px-4 py-3 font-medium text-emerald-950 whitespace-nowrap">
        <div class="flex items-center mr-3">
            {{$author->name}}
        </div>
    </th>
    <td class="px-4 py-3">
        @foreach ($author->book as $book)
        <span class="bg-primary-100 text-emerald-950 text-xs font-medium py-0.5 rounded">
            {{$book->name}}
            @if (!$loop->last)
            ,
            @endif
        </span>
        @endforeach
    </td>
</tr>