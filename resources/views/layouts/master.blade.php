<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>{{ Title::get('Mississippi Enlightened', '|', TRUE) }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- stylesheets -->
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css"
              href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css"
              href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        @yield('styles')
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>


    </head>
    <body id="home">
        <header class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse"
                            data-target=".bs-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ route('/') }}" class="navbar-brand">MS Enlightened</a>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ action('PagesController@QuickStart') }}">
                                Quick Start
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Agents
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                FAQ
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img alt="" class="profile-img" src="{{ Auth::user()->avatar }}">
                                    {{ Auth::user()->agent }}
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><i class="fa fa-user"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="no-hover"><a
                                        href="{{ action('Auth\AuthController@login', ['provider' => 'google']) }}">
                                    <button class="btn btn-sm login-button"><i class="fa fa-google-plus"></i> Login
                                    </button>
                                </a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </header>

        @yield('content')

        <div id="footer-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h1>MS Enlightened</h1>
                        <p>We are the enlightened of Mississippi.</p>
                        <ul class="connect">
                            <li><a href="https://plus.google.com/u/0/communities/109608094049727300099" title="Mississippi Enlightened on Google+"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://msenl.slack.com/"><i class="fa fa-slack" title="Mississippi Enlightened Slack"></i></a></li>
                            <li><a href="https://github.com/mack-hankins/msenl" title="Github Repo"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 menu">
                        <h3>Overview</h3>
                        <ul>
                            <li>
                                <a href="{{ route('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="#">Agents</a>
                            </li>
                            <li>
                                <a href="#">FAQ</a>
                            </li>
                            <li>
                                <a href="{{ action('PagesController@QuickStart') }}">Quick Start</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 menu">
                        <h3>Ingress</h3>
                        <ul>
                            <li>
                                <a href="https://www.ingress.com/" rel="nofollow">Official Website</a>
                            </li>
                            <li>
                                <a href="https://play.google.com/store/apps/details?id=com.nianticproject.ingress&hl=en" rel="nofollow">Android Download</a>
                            </li>
                            <li>
                                <a href="https://itunes.apple.com/us/app/ingress/id576505181?mt=8" rel="nofollow">iOS Download</a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/+Ingress/posts" rel="nofollow">Ingress on Google+</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 menu">
                        <h3>Related</h3>
                        <ul>
                            <li>
                                <a href="https://www.reddit.com/r/ingress" rel="nofollow">Ingress on Reddit</a>
                            </li>
                            <li>
                                <a href="http://www.ingress-maxfield.com/" rel="nofollow">Ingress Maxfields</a>
                            </li>
                            <li>
                                <a href="http://niantic.schlarp.com/" rel="nofollow">Unofficial Wiki</a>
                            </li>
                            <li>
                                <a href="http://decodeingress.me/ingress-manual/" rel="nofollow">Decode Ingress Manual</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row credits">
                    <div class="col-md-6 left">
                        &copy; Mississippi Enlightened {{ date('Y') }}. All Rights Reserved.
                    </div>
                    <div class="col-md-6 right">
                        Built by <a href="http://www.mackhankins.com">Mack Hankins</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- javascript -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/jquery.uniform.min.js"></script>
        @yield('scripts')

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </body>
</html>