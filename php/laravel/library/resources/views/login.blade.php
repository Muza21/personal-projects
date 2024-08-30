<x-layout>
    <section class="grid min-h-screen place-items-center bg-emerald-500 p-16">
        <div class="w-72 rounded-md bg-emerald-300 p-4 pt-0 shadow-lg">
            <div class="flex items-center justify-center h-16 font-bold text-emerald-950">
                <h3 class="text-lg">Login</h3>
            </div>
            <form method="POST" action="{{ route('login.user') }}" class="grid gap-3">
                @csrf
                <x-input name="email" type="text" placeholder="Enter your email" />
                <x-input name="password" type="password" placeholder="Enter your password" />
                <x-button type="submit" class="bg-emerald-700 px-3 text-emerald-100 hover:bg-emerald-800">
                    <p>Sign In</p>
                </x-button>
            </form>
        </div>
    </section>
</x-layout>