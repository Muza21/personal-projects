@props(['quote'])

<div class="bg-white max-w-xl mx-auto rounded-xl mb-20 overflow-hidden">
    <div>
        <img src="{{ asset('storage/' . $quote->thumbnail) }}" class="max-w-full max-h-full" alt="">
    </div>

    <div class="max-w-2xl mx-auto rounded-xl text-center p-4">
        <q class="text-neutral-700 text-4xl">{{ $quote->quote }}</q>
    </div>
</div>
