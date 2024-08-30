<x-layout>
    <div class="max-w-md">
        <h3 class="text-xl font-bold mt-10">{{ __('login.welcome_back') }}</h3>
        <p class="text-sm text-gray-400 mt-5">{{ __('login.enter_your_details') }}</p>
    </div>

    <form method="POST" action="{{ route('login.user') }}" class="max-w-xl mt-8 mb-0 space-y-4">
        @csrf
        <div class="pb-4">
            <label for="Username">{{ __('login.username') }}</label>

            <div class="relative">
                <input
                    class="w-full p-4 md:p-6 pr-12 text-sm border-gray-400 rounded-lg shadow-md
                    @if (!$errors->any()) border-gray-400
                    @elseif ($errors->has('username')) border-red-500
                    @else border-green-400 @endif"
                    type="text" name="username" id="username" value="{{ old('username') }}"
                    placeholder="{{ __('login.enter_unique_username_or_email') }}">
                <img class="top-4 md:top-6 right-4 absolute
                    @if ($errors->has('username') || !$errors->any()) hidden @elseif(old('username') == '') hidden @else block @endif"
                    src="{{ asset('images/success.svg') }}" alt="success">
            </div>
            @error('username')
                <div class="flex mt-1 absolute">
                    <img src="{{ asset('images/failure.svg') }}" alt="error">
                    <p class="text-red-500 text-sm ml-1 flex">{{ $message }}</p>
                </div>
            @enderror
        </div>

        <div class="pb-4">
            <label for="password">{{ __('login.password') }}</label>
            <div class="relative">
                <input
                    class="w-full p-4 md:p-6 pr-12 text-sm border-gray-400 rounded-lg shadow-md
                    @if ($errors->has('password') || $errors->any()) border-red-500
                    @elseif(!$errors->any())border-gray-400
                    @else border-green-400 @endif"
                    type="password" name="password" id="password" placeholder="{{ __('login.fill_in_password') }}">
                <img class="top-4 md:top-6 right-4 absolute
                    @if ($errors->has('password') || !$errors->any()) hidden @elseif(old('password') == '') hidden @else block @endif"
                    src="{{ asset('images/success.svg') }}" alt="success">
            </div>

            @error('password')
                <div class="flex mt-1 absolute">
                    <img src="{{ asset('images/failure.svg') }}" alt="error">
                    <p class="text-red-500 text-sm ml-1 flex">{{ $message }}</p>
                </div>
            @enderror
        </div>

        <div class="my-6 flex justify-between">
            <div>
                <input type="checkbox" name="remember" class="accent-green-600 w-4 h-4">
                <label for="remember" class="text-sm font-semibold">{{ __('login.remember_this_device') }}</label>
            </div>
            <div>
                <a class="text-blue-700 text-sm font-semibold"
                    href="{{ route('password.request') }}">{{ __('login.forgot_password') }}</a>
            </div>
        </div>

        <button type="submit"
            class="bg-green-500 text-white text-center uppercase font-semibold text-lg py-4 md:py-6 w-full rounded-xl hover:bg-green-600">
            {{ __('login.login') }}
        </button>

        <div class="text-center mt-4">
            <p class="text-gray-400">{{ __('login.dont_have_an_account') }} <a class="text-gray-800 font-bold"
                    href="{{ route('register.view') }}" class="font-bold">{{ __('login.sign_up_for_free') }}</a></p>
        </div>
    </form>
</x-layout>
