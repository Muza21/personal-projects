<x-password-reset-layout>
    <form method="POST" action="{{ route('password.update') }}" class="max-w-md mx-auto mt-8 mb-0 space-y-4">
        @csrf
        <div class="pb-4">
            <label for="password">{{ __('register.new_password') }}</label>

            <div class="relative">
                <input class="w-full p-4 pr-12 text-sm border-gray-400 rounded-lg shadow-md" type="password"
                    name="password" id="password" required>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="pb-4">
            <label for="password_confirmation">{{ __('register.repeat_password') }}</label>

            <div class="relative">
                <input class="w-full p-4 pr-12 text-sm border-gray-400 rounded-lg shadow-md" type="password"
                    name="password_confirmation" id="password_confirmation" required>
            </div>
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input class="hidden" type="email" name="email" id="email" value="{{ $email }}" required>
            <input class="hidden" type="token" name="token" id="token" value="{{ $token }}" required>
        </div>
        <button type="submit"
            class="bg-green-500 text-white text-center uppercase font-semibold text-lg py-4 w-full rounded-xl hover:bg-green-600">
            {{ __('register.save_changes') }}
        </button>
    </form>
</x-password-reset-layout>
