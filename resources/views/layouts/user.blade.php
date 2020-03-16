<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700%7CLibre+Baskerville:400,400italic,700' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clear.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/common.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sm-clean.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body class="home blog">
    <!-- Preloader Gif -->
    <table class="doc-loader">
        <tbody>
            <tr>
                <td>
                    <img src="images/ajax-document-loader.gif" alt="Loading...">
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Left Sidebar -->
    <div id="sidebar" class="sidebar">
        <div class="menu-left-part">
            <div class="search-holder">
                <label>
                    <input type="search" class="search-field" placeholder="Type here to search..." value="" name="s" title="Search for:">
                </label>
            </div>
            <div class="site-info-holder">
                <h1 class="site-title">Suppablog</h1>
                <p class="site-description">
                    Suppablog is simple and yet cool wordpress theme to lorem ipsum dolor sit.
                </p>
            </div>
            <nav id="header-main-menu">
                <ul class="main-menu sm sm-clean">
                    <li><a href="index.html" class="current">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="scroll.html">Scroll</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <footer>
                <div class="footer-info">
                    © 2018 SUPPABLOG HTML TEMPLATE. <br> CRAFTED WITH <i class="fa fa-heart"></i> BY <a href="https://colorlib.com">COLORLIB</a>.
                </div>
            </footer>
        </div>
        <div class="menu-right-part">
            <div class="logo-holder">
                <a href="{{ url('/') }}">
                    <img src="images/logo.png" alt="id UFFS CC">
                </a>
            </div>
            <div class="toggle-holder">
                <div id="toggle">
                    <div class="menu-line"></div>
                </div>
            </div>
            <div class="social-holder">
                <div class="social-list">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                    <a href="#"><i class="fa fa-rss"></i></a>
                </div>
            </div>
            <div class="fixed scroll-top"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i></div>
        </div>
        <div class="clear"></div>
    </div>

    <!-- Home Content -->
    <div id="content" class="site-content">
        <div id="blog-wrapper">
            <div class="blog-holder center-relative">


                <article id="post-1" class="blog-item-holder featured-post">
                    <div class="entry-content relative">
                        <div class="content-1170 center-relative">
                            <div class="cat-links">
                                <ul>
                                    <li>
                                        <a href="#">Crafting</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="entry-date published">February 12, 2016</div>
                            <h2 class="entry-title">
                                Whatever is begun in anger ends in shame
                            </h2>
                            <div class="excerpt">
                                Now when I had mastered the language of this water and had come to know every trifling feature that bordered the great river as familiarly as I knew the letters of the alphabet, I had made a valuable acquisition. I still keep in mind a certain wonderful sunset which I witnessed when and steamboating<a class="read-more" href="single.html"></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="clear"></div>
            <div class="block load-more-holder">LOAD MORE ENTRIES</div>
        </div>

        <div class="featured-image-holder">
            <div class="featured-post-image" style="background-image: url(images/demo/featured-image.jpg)"></div>

        </div>
        <div class="clear"></div>
    </div>

    <!--Load JavaScript-->
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.smartmenus.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
