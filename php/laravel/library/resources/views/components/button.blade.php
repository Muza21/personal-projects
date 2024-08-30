<button type="{{ $type ?? 'button' }}" id="createProductButton" data-modal-toggle="createProductModal"
    class="flex items-center justify-center focus:outline-none font-medium rounded-lg text-sm py-2 px-3 {{ $class ?? 'text-white bg-blue-500  hover:bg-blue-700' }}">
    {{$slot}}
</button>