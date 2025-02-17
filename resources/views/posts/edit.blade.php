<x-layout>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="heading text-center font-bold text-2xl m-5 text-gray-800">
            Update the Post
        </div>
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input name="title" value="{{ old('title', $post->title) }}"
                class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false"
                placeholder="Title" type="text" required>
            @error('title')
            <div class="mb-2 text-sm text-red-600">
                {{ $message }}
            </div>
            @enderror

            <textarea name="content" class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                spellcheck="false" placeholder="Describe everything about this post here"
                required>{{ old('content', $post->content) }}</textarea>
            @error('content')
            <div class="mb-2 text-sm text-red-600">
                {{ $message }}
            </div>
            @enderror

            <div class="buttons flex mt-2">
                <a href="{{ url()->previous() }}"
                    class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">
                    Cancel
                </a>
                <button type="submit"
                    class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">
                    Update
                </button>
            </div>
        </div>
    </form>
</x-layout>