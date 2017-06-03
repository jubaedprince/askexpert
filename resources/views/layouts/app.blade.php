<!DOCTYPE html>
<html lang="en" ng-app="aeApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'AskExpert') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <link href="/css/style.css" rel="stylesheet">

    <link href="/css/carousel.css" rel="stylesheet">

    @yield('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>

</head>
<body>
    <div id="app" ng-controller="AppController">
        <nav class="navbar navbar-default navbar-static-top">
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
                    <a  href="{{ url('/') }}" ><img width="170px" src="/images/askexpert_logo.png"></a>
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'AskExpert') }}--}}
                    {{--</a>--}}
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Categories <span class="caret"></span>
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



                        <li><a href="{{ url('/expert') }}">Browse Experts</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
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
        @yield('content')
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
