<!DOCTYPE html>
<html lang="en" ng-app="aeApp">
<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PWRS3TC');
    </script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="-VTlQvpwyVlTSCuvCiSLl696V7E2Dk-cEHgBe4-svAQ" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'AskExpert') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <link href="/css/style.css" rel="stylesheet">

    <link href="/css/carousel.css" rel="stylesheet">

    <link rel="stylesheet" href="/external-libraries/font-awesome-4.7.0/css/font-awesome.min.css">
    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>

    {{--Google analytics--}}


    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-100984978-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWRS3TC"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app" ng-controller="AppController">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    {{--<a href="{{ url('/') }}">--}}
                        <a class="navbar-brand"  href="{{ url('/') }}" ><img width="120px" src="/images/askexpert_logo.png" style="margin-top: -6%"></a>
                        {{--{{ config('app.name', 'AskExpert') }}--}}
                    {{--</a>--}}
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    CATEGORIES <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                @foreach(App\Tag::all() as $tag)
                                    <li>
                                        <a href="/service?by={{$tag->name}}">
                                            {{$tag->name}}
                                        </a>
                                    </li>
                                @endforeach
                                
                                </ul>
                            </li>



                        <li><a href="{{ url('/expert') }}">BROWSE EXPERTS</a></li>
                        <li><a href="{{ url('/contact') }}">CONTACT</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li id="become-an-expert"><a href="{{ url('/expert/register') }}">Become An Expert</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                                    {!! explode(" ", Auth::user()->name, 2)[0] !!}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li>
                                        <a href="/home">
                                            Profile
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>

                    <div class="col-sm-3 col-md-3 pull-right">
                        <form class="navbar-form" role="search" action="/search" method="POST">
                            {{csrf_field()}}
                            <div class="input-group">
                                <input type="text" name="query_term" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </nav>
        <div class="all-content">
            @yield('content')
        </div>

        <footer class="container text-center">
            <div class="pull-left" style="margin-top: 8px">
                <p>© askexpert.co</p>

            </div>
            <div class="pull-right">
                <ul class="footer-navigation">
                    <li class="footer-navigation-li"> <a href="/sitemap">Site Map</a></li>
                    <li class="footer-navigation-li"> <a href="/terms">Terms</a></li>
                    <li class="footer-navigation-li"><a><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="footer-navigation-li"><a><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="footer-navigation-li"><a><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>





            </div>
        </footer>

        <ae-modal ng-show="showModal"></ae-modal>

    </div>

    <!-- Scripts -->
    <script src="/node_modules/jquery/dist/jquery.js"></script>
    <script src="/node_modules/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="/node_modules/angular/angular.js"></script>
    <script src="/angular/app.js"></script>

    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearchLite.min.js"></script>

    @yield('scripts')



</body>
</html>
