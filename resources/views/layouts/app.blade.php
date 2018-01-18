<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Erin &amp; Reeds Wedding Photos</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.8/release/featherlight.min.css" type="text/css" rel="stylesheet" />
    <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.8/release/featherlight.gallery.min.css" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
                    Erin &amp; Reed's Wedding Photos
                </a>
            </div>
            
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                    <li>
                        <a href="{{ route('home') }}">Upload</a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')
</div>

<!-- Scripts -->
<!-- Needed for vue-clazy-load onscroll behavior -->
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-touch-events/1.0.5/jquery.mobile-events.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/detect_swipe/2.1.1/jquery.detect_swipe.min.js"></script> -->
<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.8/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

<script src="//cdn.rawgit.com/noelboss/featherlight/1.7.8/release/featherlight.gallery.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $('.gallery').featherlightGallery({
		previousIcon: '&#9664;',     /* Code that is used as previous icon */
		nextIcon: '&#9654;',         /* Code that is used as next icon */
		galleryFadeIn: 300,          /* fadeIn speed when slide is loaded */
		galleryFadeOut: 300,          /* fadeOut speed before slide is loaded */
        openSpeed:    300,
        closeSpeed:   300
    });
    </script>
</body>
</html>
