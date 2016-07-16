@extends('layouts.master')

@section('content')

    @include('partials.hero_index_pub')

    <div id="features">
        <div class="container">
            <div class="row index-header">
                <div class="col-md-12">
                    <h2>Join us as we battle the Resistance for control of the world.</h2>

                    <p>Ingress transforms the real world into the landscape for a global game.</p>
                </div>
            </div>
            <div class="row feature backwards">
                <div class="col-md-6 info">
                    <h4>Ingress. The game.</h4>

                    <p>
                        It's happening all around you. They aren't coming. They're already here.
                    </p>

                    <p>
                        <a href="https://play.google.com/store/apps/details?id=com.nianticproject.ingress&hl=en"
                           target="_blank"><img src="images/google-play.png" alt="Get it on Google Play"/></a>
                        <a href="https://itunes.apple.com/us/app/ingress/id576505181?mt=8"" target="_blank"><img
                                src="images/app-store.png" alt="Get it on the Apple Store"/></a>
                    </p>
                </div>
                <div class="col-md-6 image">
                    <img src="images/ingress.com.png" class="img-responsive" alt="feature2"/>
                </div>
            </div>
            <div class="divider"></div>
            <div class="row feature">
                <div class="col-md-6 info">
                    <h4>You'll be asked to make a choice of which team you would like to join.</h4>

                    <p>
                        We are “The Enlightened”. We seek to embrace the power that Exotic Matter (XM) may bestow upon
                        the human race.
                    </p>

                    <div class="join">Join The Enlightened</div>
                </div>
                <div class="col-md-6 image">
                    <img src="images/ingress-devices.png" class="img-responsive" alt="feature1"/>
                </div>
            </div>
        </div>
    </div>

    <div id="equipment">
        <div class="container">
            <div class="row index-header">
                <div class="col-md-12">
                    <h3>Build, Protect, and Destroy</h3>

                    <p>Become a force to be reckoned with as you level up your agent.</p>
                </div>
                <div class="col-md-4">
                    <h4>Resonators</h4>
                    <img src="{{ URL::asset('images/resonator.png') }}" class="img-responsive"/>

                    <p>XM object used to power-up a Portal and align it to a Faction.</p>
                </div>
                <div class="col-md-4">
                    <h4>Mods</h4>
                    <img src="{{ URL::asset('images/shield.png') }}" class="img-responsive"/>

                    <p>Mod which shields Portal from attacks.</p>
                </div>
                <div class="col-md-4">
                    <h4>Weapons</h4>
                    <img src="{{ URL::asset('images/burster.png') }}" class="img-responsive"/>

                    <p>XExotic Matter Puse Weapons which destroy enemy Resonators and Mods and neutralize enmy
                        Portals.
                    </p>
                </div>
                <div>
                    <a href="{{ URL::action('PagesController@QuickStart') }}">
                        <button class="btn btn-lg">Quick Start</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="features">
        <div class="container">
            <div class="row feature index-header">
                <div class="col-md-12">
                    <h2>Join Our Community</h2>

                    <p>Ingress is all about community and meeting agents all around you.</p>
                </div>
            </div>
            <div class="row community">
                <div class="col-md-4">
                    <img src="{{ URL::asset('images/msenl_slack.jpg') }}" class="img-responsive"/>

                    <h3>Communicate</h3>

                    <p>Slack is just one of the tools we use to communicate with Agents outside of Ingress.</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ URL::asset('images/msenl_ops.jpg') }}" class="img-responsive"/>

                    <h3>Operations</h3>

                    <p>We've been known to make smurfs cry. Operations are the coordination of dozen of agents from all
                        over.</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ URL::asset('images/msenl_events.jpg') }}" class="img-responsive"/>

                    <h3>Events</h3>

                    <p>Our community regularly participates in anomalies and other sponsored events.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="frogs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="wow rubberBand animated">Frogs Rule <a href="https://play.google.com/store/apps/details?id=com.nianticproject.ingress&hl=en" target="_blank"><i class="fa fa-android"></i></a></li>
                        <a href="https://itunes.apple.com/us/app/ingress/id576505181?mt=8" target="_blank"><i class="fa fa-apple"></i></a></h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.0.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
@endsection

