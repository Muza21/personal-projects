<x-navigation>
    <section>
        <main class="max-w-lg mx-auto mt-14 bg-slate-100 p-6 rounded-xl">


            <form method="POST" action="{{ route('movies.update', $movie->id) }}" enctype="multipart/form-data"
                class="mt-10">
                @csrf
                @method('PATCH')

                <header class="text-center font-bold text-xl pb-6 mb-6 border-b-2 border-gray-300">
                    <h2>{{ __('texts.update_movie') }}</h2>
                </header>

                <div class="mb-6">
                    <label for="title_en">{{ __('texts.movie_title_en') }}</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="title_en"
                        id="title_en" value="{{ old('title_en', $movie->getTranslation('title', 'en')) }}" required>

                    @error('title_en')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="title_ka">{{ __('texts.movie_title_ka') }}</label>

                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="title_ka"
                        id="title_ka" value="{{ old('title_ka', $movie->getTranslation('title', 'ka')) }}" required>

                    @error('title_ka')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-6 rounded-xl hover:bg-green-600">
                    {{ __('texts.update') }}
                </button>

            </form>

        </main>
    </section>
</x-navigation>
