<x-layout>
    <div>
        <h3 class="text-xl font-bold mt-10">{{ __('register.welcome_to_coronatime') }}</h3>
        <p class="text-sm text-gray-400 mt-5">{{ __('register.enter_your_details') }}</p>
    </div>

    <form method="POST" action="{{ route('registration.store') }}" class="max-w-xl mt-8 mb-0 space-y-4">
        @csrf
        <div>
            <label for="Username">{{ __('register.username') }}</label>

            <div class="relative">
                <input class="w-full p-4 md:p-6 pr-12 text-sm border-gray-400 rounded-lg shadow-md" type="text"
                    name="username" id="username" value="{{ old('username') }}"
                    placeholder="{{ __('register.enter_unique_username') }}">
                <label for="username" class="text-gray-400">{{ __('register.username_should_be_unique') }}</label>
            </div>
            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">{{ __('register.email') }}</label>
            <div class="relative">
                <input class="w-full p-4 md:p-6 pr-12 text-sm border-gray-400 rounded-lg shadow-md" type="email"
                    name="email" id="email" value="{{ old('email') }}"
                    placeholder="{{ __('register.enter_your_email') }}">
            </div>
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">{{ __('register.password') }}</label>
            <div class="relative">
                <input class="w-full p-4 md:p-6 pr-12 text-sm border-gray-400 rounded-lg shadow-md" type="password"
                    name="password" id="password" placeholder="{{ __('register.fill_in_password') }}">
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">{{ __('register.repeat_password') }}</label>
            <div class="relative">
                <input class="w-full p-4 md:p-6 pr-12 text-sm border-gray-400 rounded-lg shadow-md" type="password"
                    name="password_confirmation" id="password_confirmation"
                    placeholder="{{ __('register.repeat_password') }}">
            </div>
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="bg-green-500 text-white text-center  uppercase font-semibold text-lg py-4 md:py-6 w-full rounded-xl hover:bg-green-600">
            {{ __('register.sign_up') }}
        </button>

        <div class="text-center">
            <p>{{ __('register.already_have_an_account') }} <a href="{{ route('login.view') }}"
                    class="font-bold">{{ __('register.login') }}</a></p>
        </div>
    </form>
    </div>
</x-layout>
