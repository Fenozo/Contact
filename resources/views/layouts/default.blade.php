<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('specific.app_name') }}</title>
        <meta name="author" content="FreeHTML5.co" />


        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
        <style>
           
        </style>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
                <div class="top-right links">
                    @if (Route::has('login'))
                        
                        @auth
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('home_url') }}">dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                ">
                                        {{ __('Logout') }}
                                    </a>

                            <form id="logout-form" action="{{ route('logout') }}" 
                                method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('home') }}">Home</a>
                            
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif
                    



                </div>
            

            <div class="content body">
                @yield('content')
            </div>

            <div class="content">
            <footer class="footer">
                    <div class="text-center">
                        &copy; copyright 
                        <?php echo (new Datetime())->format('Y')?>
                    </div>
                </footer>
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
