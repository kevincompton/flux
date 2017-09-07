<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="https://use.fontawesome.com/c753f43933.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="wrapper">
            <header>
                <nav class="main-nav">
                    <ul>
                        <li><a href="/">HOME</a></li>
                    </ul>
                </nav>

                <span class="logo"><a href="/"><img src="/images/logo.png" /></a></span>

                <div class="top-right links">
                    @if(Auth::user())
                        <a href="/dashboard">Your Dashboard</a> 
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('login') }}">Already have an account?</a>
                        <a class="btn" href="{{ route('register') }}">Start Today</a>
                    @endif
                    <div class="concierge"><i class="fa fa-phone" aria-hidden="true"></i> 866.FLUX.218</div>
                </div>
            </header>
        </div>

        <div class="content">
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
