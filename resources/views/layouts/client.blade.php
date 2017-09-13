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

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="wrapper">
            <header>
                <nav class="main-nav">
                    <ul>
                        <li><a href="/">HOME</a></li>
                        <li><a href="/">PRIME</a></li>
                        <li><a href="/">PLUS</a></li>
                    </ul>
                </nav>

                <span class="logo"><a href="/"><img src="/images/logo.png" /></a></span>

                <div class="top-right links">
                    @if(Auth::user())
                        
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <a class="btn" href="/dashboard">Your Dashboard</a> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('login') }}">Already have an account?</a>
                        <a class="btn" href="/signup">Start Today</a>
                    @endif
                    <div class="concierge"><i class="fa fa-phone" aria-hidden="true"></i> 866.FLUX.218</div>
                </div>
            </header>
        </div>

        <div class="content">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="site-info">
                <div class="social">
                    <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                        <a href="https://www.facebook.com/FluxCredit/" class="p-type col-xs-4" target="_blank"><i class="fa fa-3x fa-facebook"></i></a>
                        <a href="https://www.instagram.com/fluxcredit/" class="p-type col-xs-4" target="_blank"><i class="fa fa-3x fa-instagram"></i></a>
                        <a href="https://www.yelp.com/biz/flux-credit-woodland-hills" class="p-type col-xs-4" target="_blank"><i class="fa fa-3x fa-yelp"></i></a>
                    </div>
                </div>
                <div class="ssl row">
                    <p class="col-xs-12">Site Secured By</p>
                    <a href="https://letsencrypt.org/how-it-works/"><img class="col-xs-6" src="//fluxcredit.com/wp-content/themes/fluxcredit/img/lets-encrypt-logo.svg" alt=""></a>
                   
                </div>
                <div class="container disclaimer">
                    <p>*Clients who enroll their debt and complete the Flux Prime or Flux Plus program will save on average between 35% to 50% of their qualified financial obligations, over a 12 to 36-month period. This savings includes all program fees. Clients will earn cash back on all settlement payments, which can be applied towards a prepaid credit card. Upon program completion, clients will have started rebuilding their credit and may withdraw the money they have earned. Not all clients are able to complete our program for various reasons, however with Flux Flex, clients may be able to extend the program over longer payment terms. Our estimates are based on prior results, which will vary depending on your specific circumstances. We do not guarantee that your debts will be lowered by a specific amount or percentage or that you will be debt-free within a specific period of time. We do not assume consumer debt and we only make monthly payments to creditors when clients and creditors agree on terms. Except for clients who are enrolled in Flux Plus, we do not provide tax, bankruptcy, accounting, legal advice or credit repair services. Some aspects of our service may not be available in all states. Read and understand all program materials prior to enrollment, including but not limited to potential adverse impact on credit rating.</p>
                </div>
                <span class="copyright" href="/">© 2017 FLUX CREDIT<span class="sep"> ALL RIGHTS RESERVED </span></span>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-104515570-1', 'auto');
          ga('send', 'pageview');

        </script>

        @yield('footer')

    </body>
</html>
