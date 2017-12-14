<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Flux Credit</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
        <script src="https://use.fontawesome.com/c753f43933.js"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="@yield('body_class')">

        <i class="fa fa-bars mobile-toggle" aria-hidden="true"></i>
        <ul class="mobile-nav">
            <li><a href="/prime">PRIME</a></li>
            <li><a href="/plus">PLUS</a></li>
            <li><a href="/payment">Make A Payment</a></li>
            @if(Auth::user())
                <li>
                    <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                </li>
                <li><a href="/dashboard">DASHBOARD</a></li>
            @else
                <li><a href="/register">START TODAY</a></li>
            @endif
        </ul>

        <header>

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
                    <a class="btn" href="/register">Start Today</a>
                @endif
                
            </div>

            <div class="concierge"><a href="tel:+1-866-358-9218"><i class="fa fa-phone" aria-hidden="true"></i> 1-866-FLUX-218</a></div>

            <nav class="main-nav">
                <ul>
                    <li><a href="/prime">PRIME</a></li>
                    <li><a href="/plus">PLUS</a></li>
                </ul>
            </nav>

        </header>

        <div class="content">
            @yield('content')
        </div>

        <footer class="main-footer">
            
            <div class="container footer-nav">

                <div class="footer-col footer_cta">
                    <img src="/images/logo.png" alt="Flux Credit">

                    <a class="concierge" href="tel:+1-866-358-9218"><i class="fa fa-phone" aria-hidden="true"></i> 1-866-FLUX-218</a>

                    <div class="footer_cta">
                        <a href="#" class="btn">Prime</a>
                        <a href="#" class="btn">Plus</a>
                        <a class="cta-btn btn col-xs-12  col-sm-12 col-sm-offset-0" href="/register">START TODAY!</a>
                    </div>

                    <h5>FLUX CREDIT IS A TRUSTED NAME IN PERSONAL FINANCE AND CREDIT REPAIR.  WE WORK ALONGSIDE:</h5>

                    <ul id="partners">
                        <li><img src="/images/bbb.png" /></li>
                        <li><img src="/images/visa.png" /></li>
                        <li><img src="/images/equifax.png" /></li>
                        <li><img src="/images/bofl.png" /></li>
                        <li><img src="/images/experian.png" /></li>
                        <li><img src="/images/credit_karma.png" /></li>
                        <li><img src="/images/transunion.png" /></li>
                    </ul>
                </div>

                <ul>
                    <li>
                        <div class="social">
                            <div>
                                <a href="https://www.facebook.com/FluxCredit/" class="p-type col-xs-4" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/fluxcredit/" class="p-type col-xs-4" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.yelp.com/biz/flux-credit-woodland-hills" class="p-type col-xs-4" target="_blank"><i class="fa fa-yelp"></i></a>
                            </div>
                        </div>
                    </li>
                    <li>Already have an account?<br>
                        <a href="#" class="btn">Login</a></li>
                    <li><a href="#">CONTACT US</a></li>
                    <li><a href="/payment/">MAKE A PAYMENT</a></li>
                    <li><a href="#">BECOME AN AFFILIATE</a></li>
                    <li><a href="#">TERMS & CONDITIONS</a></li>
                    <li><a href="#">PRIVACY POLICY</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>

            </div>

                
            <div class="site-info">
                
                <div class="ssl row">
                    <p class="col-xs-12">Site Secured By</p>
                    <a href="https://letsencrypt.org/how-it-works/"><img class="col-xs-6" src="/images/lets-encrypt-logo.svg" alt=""></a>     
                </div>
                
                <span class="copyright" href="/">© 2017 FLUX CREDIT<span class="sep"> ALL RIGHTS RESERVED </span></span>
            </div>

        </footer>

        @include('partials._contact-sticky')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
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
