<x-password-reset-layout>
    <form method="POST" action="{{ route('password.email') }}" class="max-w-md mx-auto mt-8 mb-0 space-y-4">
        @csrf
        <div class="pb-4">
            <label for="email">{{ __('login.email') }}</label>

            <div class="relative">
                <input class="w-full p-4 pr-12 text-sm border-gray-400 rounded-lg shadow-md" type="email" name="email"
                    id="email" value="{{ old('email') }}" required>
            </div>
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>



        <button type="submit"
            class="bg-green-500 text-white text-center uppercase font-semibold text-lg py-4 w-full rounded-xl hover:bg-green-600">
            {{ __('login.reset_password') }}
        </button>
    </form>
</x-password-reset-layout>
