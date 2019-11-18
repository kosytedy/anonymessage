<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href={{ asset("css/app.css") }}>
        <link rel="stylesheet" href={{ asset("css/custom.css") }}>

    </head>
    <body class="bg-white">
        <div class="full-height">
            <div class="row">
                <div class="col-md-5 col-sm-12 text-center p-5">
                    <div class="vertical-center">
                        <span class="title">{{ config('app.name') }}</span>
                        <div class="mb-3 text"> Send and receive honest anonymous messages from your friends. It's always fun!</div>
                        <a href="{{ route('login') }}" class="btn btn-blueviolet">Get private link</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-white">See messages</a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 mt-4">
                    <img src={{ asset("images/standing-3@2x.png") }} width="49%">
                    <img src={{ asset("images/sitting-8@2x.png") }} width="49%">
                </div>
                <div class="clip"></div>
            </div>
        </div>
    </body>
</html>
