<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>
    @vite('resources/css/app.css')
</head>
<style>
    .checkmark__circle {
        fill: #c7e6c8;
    }

    .checkmark {
        width: 56px;
        height: 56px;
        animation: scale .3s;
    }

    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        stroke-width: 4;
        stroke: #7ac142;
        animation: stroke cubic-bezier(0.65, 0, 0.45, 1) 0.6s forwards;
    }

    @keyframes stroke {
        100% {
            stroke-dashoffset: 0;
        }
    }

    @keyframes scale {

        0%,
        100% {
            transform: none;
        }

        50% {
            transform: scale3d(1.1, 1.1, 1);
        }
    }
</style>


<body>
    <div class="max-w-sm m-auto mt-8">
        <img class="m-auto" src="{{ asset('images/Group 1.svg') }}" alt="coronatime">
        <div class="mt-48">
            <svg class="checkmark m-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="26" fill="none" />
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
        </div>
        <div class="mt-6 text-center">
            <p class="text-lg">{{ __('notice.your_password_is_recovered') }}</p>
        </div>
        <div class="mt-6 m-auto">
            <a href="{{ route('login.view') }}">
                <button
                    class="bg-green-500 py-4 w-full text-white text-center uppercase font-semibold text-lg rounded-xl hover:bg-green-600">
                    {{ __('notice.sign_in') }}
                </button>
            </a>
        </div>
    </div>
</body>

</html>
