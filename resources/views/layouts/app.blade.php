<!DOCTYPE html>
<html lang="en">
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
    <div id="app">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'AskExpert') }}
                    </a>
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
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearchLite.min.js"></script>


    <script>
        var EXPERT_ID;
        var EXPERT_RATE;
        function setGlobalExpert(expert_id, expert_rate){
            EXPERT_ID = expert_id;
            EXPERT_RATE = expert_rate;

            $('#estimated_duration').html("" +
                    "<option value='"+ "5 minutes, Tk." + EXPERT_RATE*5  +"'>5 minutes, Tk." + EXPERT_RATE*5 + "</option>" +
                    "<option  value='"+ "10 minutes, Tk." + EXPERT_RATE*10   +"'>10 minutes, Tk." + EXPERT_RATE*10 + "</option>" +
                    "<option  value='"+ "15 minutes, Tk." + EXPERT_RATE*15   +"'>15 minutes, Tk." + EXPERT_RATE*15 + "</option>" );


        }
    </script>


    <!-- Modal -->
    @include('meeting.book_modal')
    @yield('scripts')

</body>
</html>
