<tr class="border-b border-emerald-800 hover:bg-emerald-400">
    <th scope="row" class="px-4 py-3 font-medium text-emerald-950 whitespace-nowrap">
        <div class="flex items-center mr-3">
            {{$book->name}}
        </div>
    </th>
    <td class="px-4 py-3">
        @foreach ($book->authors as $author)
        <span class="bg-primary-100 text-emerald-950 text-xs font-medium py-0.5 rounded">
            {{$author->name}}
            @if (!$loop->last)
            ,
            @endif
        </span>
        @endforeach
    </td>
    <td class="px-4 py-3 font-medium text-emerald-950 whitespace-nowrap">
        <div class="flex items-center">
            {{$book->publish_date}}
        </div>
    </td>
    <td class="px-4 py-3 font-medium text-emerald-950 whitespace-nowrap">
        {{$book->status}}
    </td>
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
        <x-crud-buttons :book="$book" />
    </td>
</tr>