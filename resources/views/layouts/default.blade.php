<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <meta name="author" content="FreeHTML5.co" />


        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
            html, body {
                background-color: #ccc;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                margin-top: -50px;
            }

            /*.position-ref {
                position: relative;
            }*/

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 61%;
            }

            .title h1{
                font-size: 55px;
                margin-bottom: 10px;
                color: #fff;
                color: #251d1d;
                text-shadow: 5px 0px 3px #636b6f;
            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .title a {
                color: green;
                font-size: 22px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .input {
                width: 100%;
                height: 2em;
                border:1px solid;
                border-color:#ccc;
                background-color:#fff;
                color:#000;
                font-size:20px;
                border-radius:2px;
                padding:2px 5px;
            }

            /*************************/

            .error-msg {
				color: #f16815;
				font-weight: 900;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{--
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            --}}

            <div class="content">
                @yield('content')


                {{-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
            </div>
        </div>
    </body>
</html>
