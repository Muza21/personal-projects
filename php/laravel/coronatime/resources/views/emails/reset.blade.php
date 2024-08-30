<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coronatime</title>
</head>
<style>
    main {
        margin-top: 10%;
    }

    div {
        margin-left: auto;
        margin-right: auto;
        font-size: 18px;
        line-height: 18px;
        width: 343px;
    }

    #confirm {
        font-weight: 700;
        margin-left: auto;
        margin-right: auto;
    }

    p {
        text-align: center;
    }

    a {
        display: inline-block;
        padding: 1em 3em;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        margin: 0 auto;

        background-color: #7ac142;
    }

    .button {
        width: 100%;
        text-align: center;
    }
</style>

<body>
    <main>
        <div class="button">
            <img src="{{ asset('images/Landing (Worldwide) 2.png') }}" alt="coronatime">
            <br><br>
            <p style="text-align: center; color: black; font-weight: 700;">{{ __('mailable.recover_password') }}</p>
            <p style="text-align: center; color: black;">{{ __('mailable.click_this_button_password') }}</p>
        </div>
        <div class="button">
            <a href="{{ route('password.reset', [$data['token'] . '?email=' . $data['email']]) }}">
                {{ __('mailable.recover_password') }}
            </a>
        </div>
    </main>
</body>

</html>
