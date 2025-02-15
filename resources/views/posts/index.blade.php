<x-layout>
  <section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
      <div class="-my-8 divide-y-2 divide-gray-100">
        @foreach ($posts as $post)
        <div class="py-8 flex flex-wrap md:flex-nowrap">
          <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
            <span class="font-semibold title-font text-gray-700">{{ $post->user->name }}</span>
            <span class="mt-1 text-gray-500 text-sm">
              {{ $post->created_at->format('F j, Y, g:i a') }}
            </span>
            @if(auth()->check() && auth()->id() === $post->user_id)
            <span class="flex gap-[10px] mt-4">
              <a href="{{ route('posts.edit', $post) }}" class="hover:bg-gray-300 p-2 rounded-md block">
                <x-icons.edit-icon />
              </a>
              <form action="{{ route('posts.destroy', $post) }}" method='POST'>
                @csrf
                @method('DELETE')
                <button type="submit" class="hover:bg-gray-300 p-2 rounded-md block">
                  <x-icons.delete-icon />
                </button>
              </form>
            </span>
            @endif
          </div>
          <div class="md:flex-grow">
            <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">
              {{ $post->title}}
            </h2>
            <p class="leading-relaxed">
              {{ $post->content }}
            </p>
            <a href="{{ route('posts.show', $post) }}" class="text-indigo-500 inline-flex items-center mt-4">Learn More
              <x-icons.arrow-icon />
            </a>
          </div>
        </div>
        @endforeach
      </div>
  </section>
</x-layout>