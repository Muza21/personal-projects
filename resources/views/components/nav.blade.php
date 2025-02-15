<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex items-baseline space-x-4">
                    <a href="/" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                        aria-current="page">Blogs</a>
                </div>
            </div>
            <div class="ml-4 flex items-center md:ml-6">
                @if(auth()->check())
                <form action="/logout" method="POST">
                    @csrf
                    <button
                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                        type="submit">Logout</button>
                </form>
                @else
                <a href="/login"
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                    aria-current="page">Login</a>
                <a href="/register"
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                    aria-current="page">Register</a>
                @endif

            </div>

        </div>
    </div>
</nav>