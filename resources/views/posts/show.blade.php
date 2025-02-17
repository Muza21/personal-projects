<x-layout>
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article
            class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <div>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">
                                {{ $post->user->name }}
                            </p>
                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">
                                    {{ $post->created_at->format('F j, Y, g:i a') }}
                                </time></p>
                        </div>
                    </div>
                </address>
                <h3
                    class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{ $post->title }}
                </h3>
                <p class="break-words">
                    {{ $post->content }}
                </p>
                <section class="not-format">
                    <div class="flex justify-between items-center mb-6 mt-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion ({{
                            $post->comments->count() }})</h2>
                    </div>
                    @if(auth()->check())
                    <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-6">
                        @csrf
                        <div
                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea name="comment" id="comment" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="Write a comment..." required></textarea>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Post comment
                        </button>
                    </form>
                    @endif
                    @foreach($post->comments as $comment)
                    <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">
                                    {{ $comment->user->name }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                        {{ $comment->created_at->format('F j, Y, g:i a') }}
                                    </time>
                                </p>
                            </div>
                            <div>
                                @if(auth()->id() == $comment->user_id)
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <x-icons.delete-icon />
                                    </button>
                                </form>
                                @endif
                            </div>
                        </footer>
                        <p>
                            {{ $comment->body }}
                        </p>
                    </article>
                    @endforeach
                </section>
        </article>
    </div>
</x-layout>