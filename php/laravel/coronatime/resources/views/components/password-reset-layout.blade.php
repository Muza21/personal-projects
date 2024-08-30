{{-- @vite('resources/css/app.css')
<div class="max-w-sm m-auto">
    <header class="mt-6">
        <img class="m-auto" src="{{ asset('images/Group 1.svg') }}" alt="coronatime">
        <h3 class="mt-28 text-xl text-center font-bold">{{ __('login.reset_password') }}</h3>
    </header>
    {{ $slot }}
</div> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coronatime</title>
    @vite('resources/css/app.css')
</head>

<body>
    <section class="relative md:h-screen">
        <div class="w-full px-4 mt-12 md:px-8">

            <div class="max-w-md mx-auto">
                <img class="m-auto" src="{{ asset('images/Group 1.svg') }}" alt="coronatime">
                <h3 class="mt-28 text-xl text-center font-bold">{{ __('login.reset_password') }}</h3>
            </div>

            {{ $slot }}

        </div>

    </section>
</body>

</html>
