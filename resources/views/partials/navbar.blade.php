
<!-- Header -->
<header id="header" class="header header-dark block">
    <div class="header-inner">

        <!-- Logo -->
        <div class="logo">
            <a href="{{ route('/') }}">
                MS Enlightened
            </a>
        </div>
        <!-- End Logo -->

        <!-- Mobile Navbar Icon -->
        <div class="nav-mobile nav-bar-icon">
            <span></span>
        </div>
        <!-- End Mobile Navbar Icon -->

        <!-- Navbar Navigation -->
        <div class="nav-menu singlepage-nav">
            <ul class="nav-menu-inner">
                <li>
                    <a href="{{ route('quickstart') }}">Quick Start</a>
                </li>
                <li>
                    <a href="{{ route('agents.index') }}">Agents</a>
                </li>
                <li>
                    <a href="{{ route('faq') }}">FAQ</a>
                </li>
                @role('admin')
                <li>
                    <a class="external menu-has-sub">Admin <i class="fa fa-angle-down"></i></a>
                    <ul class="sub-dropdown dropdown">
                        <li><a class="external" href="{{ route('admin.agents.index') }}">Agents</a></li>
                        <li><a class="external" href="{{ route('admin.faqs.index') }}">FAQ</a></li>
                        <li><a class="external" href="{{ route('admin.badges.index') }}">Badges</a></li>
                    </ul>
                </li>
                @endrole()
                @if(Auth::check())
                    <li>
                        <a class="external menu-has-sub" href="javascript:;">
                            <img alt="" class="profile-img sm" src="{{ Auth::user()->avatar }}"/>
                            {{ Auth::user()->agent }}
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="sub-dropdown dropdown">
                            <li>
                                <a href="{{ route('agents.show', Auth::user()->agent) }}">
                                    <i class="fa fa-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/auth/logout') }}">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="no-hover">
                        <a href="{{ action('Auth\AuthController@login', ['provider' => 'google']) }}">
                                <button class="google-plus">
                                    <i class="fa fa-google-plus"></i> Login
                                </button>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- End Navbar Navigation -->

    </div>
</header>
<!-- End Header -->
