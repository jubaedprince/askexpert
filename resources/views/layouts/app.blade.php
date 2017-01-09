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
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                            </div>
                        </form>

                        <div id="search-result" style="position: absolute;">
                            <ul id="search-result-ul" class="list-group">

                            </ul>
                        </div>
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
        var client = algoliasearch('TIG0XU3QFZ', '87316f42542b416bfcccb8629af5e246');
        var index = client.initIndex('experts');


        $("#srch-term").keypress(function () {
            $("#search-result-ul").html("");
            var searchFieldValue = ($("#srch-term").val());
            index.search(searchFieldValue, function searchDone(err, content) {
                if (err) {
                    console.error(err);
                    return;
                }

                for (var h in content.hits) {
//                    console.log('Hit(' + content.hits[h].objectID + '): ' + content.hits[h].bio);
                    console.log(content.hits[h]);
                    if($("#srch-term").val() != ""){
                        $("#search-result-ul").append("<li class='list-group-item'><img width='20%' style='margin-right: 3%' src='"+content.hits[h].profile_picture_url +"'><a href='/"+content.hits[h].slug +"'>"   + content.hits[h].user.name + "</a></li>");
                    }

                }
            });
        }).on('keydown', function(e) {
            if (e.keyCode==8)
                $('#srch-term').trigger('keypress');
        });

    </script>


    <script>
        var EXPERT_ID;
        function setGlobalExpert(expert_id){
            EXPERT_ID = expert_id;
        }
    </script>


    <!-- Modal -->
    @include('meeting.book_modal')
    @yield('scripts')

</body>
</html>
