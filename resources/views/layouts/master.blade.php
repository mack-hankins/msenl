<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>{{ isset($title) ? $title . '- Mississippi Enlightened' : 'Mississippi Enlightened' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#40923F">
    <meta name="theme-color" content="#ffffff">
    <!-- Additional Styles -->
    @yield('styles')


</head>
<body>
<div class="page-wraper">

    @include('partials.navbar')

    @yield('content')
</div>
<div id="footer-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1>MS Enlightened</h1>
                <p>We are the enlightened of Mississippi.</p>
                <ul class="connect">
                    <li><a href="https://plus.google.com/u/0/communities/109608094049727300099"
                           title="Mississippi Enlightened on Google+"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://msenl.slack.com/"><i class="fa fa-slack"
                                                              title="Mississippi Enlightened Slack"></i></a></li>
                    <li><a href="https://github.com/mackhankins/msenl" title="Github Repo"><i class="fa fa-github"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 menu">
                <h3>Overview</h3>
                <ul>
                    <li>
                        <a href="{{ route('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('agents.index') }}">Agents</a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}">FAQ</a>
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
                        <a href="https://play.google.com/store/apps/details?id=com.nianticproject.ingress&hl=en"
                           rel="nofollow">Android Download</a>
                    </li>
                    <li>
                        <a href="https://itunes.apple.com/us/app/ingress/id576505181?mt=8" rel="nofollow">iOS
                            Download</a>
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
                Created by <a href="http://www.mackhankins.com">Mack Hankins</a>
            </div>
        </div>
    </div>
</div>

<!-- javascript -->
<script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
@yield('scripts')

        <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</body>
</html>