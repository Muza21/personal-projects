@props(['posts'])


<x-post-featured-card :post="$posts[0]"/>
@if($posts->count()>1)
<div class="lg:grid lg:grid-cols-6">
    @foreach ($posts->skip(1) as $post)
        {{-- in order to find more information we use: @dd($loop) --}}
        <x-post-card :post="$posts[$loop->iteration]" class="{{ $loop->iteration<3?'col-span-3':'col-span-2' }}"/>
    @endforeach
</div>
@endif