@extends('_layouts.master')

@section('content')

    @include('_partials.page-header')
    <div class="container">
        <div class="">
            <div class="portlet light bordered">
                <div class="portlet-body">

                    <h2>The Scanner</h2>


                    <div class="divider"></div>

                    <h2>Leveling and AP</h2>

                    <div class="row">
                        <div class="col-md-12">
                            <p>You gain Action Points (AP) to level up by performing a variety of game actions. Up to
                                Level 5 it is recommended to focus on Hacking, Deploying, Linking, and Fielding.</p>

                            <p>When you reach Level 6 your XMP bursters will provide enough damage to allow for solo
                                attacking. Attacking prior to Level 6 can be attempted, but usually only against
                                unprotected portals (portals without mods – see below).</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Gaining AP</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td><b>Action</b></td>
                                            <td><b>Action Points (AP)</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Hack <span class="smurfs">Resistance</span> portal</td>
                                            <td>100 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Hack <span class="frogs">Enlightened</span>/<span
                                                        class="nuetral">Neutral</span> portal
                                            </td>
                                            <td>0 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Recharge Portal</td>
                                            <td>10 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Deploy resonator</td>
                                            <td>125 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Upgrade resonator</td>
                                            <td>65 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Capture portal</td>
                                            <td>500 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Deploy last resonator</td>
                                            <td>250 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Deploy mods</td>
                                            <td>125 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Link two portals</td>
                                            <td>313 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Construct a field</td>
                                            <td>1250 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Destroy resonator</td>
                                            <td>75 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Destroy link</td>
                                            <td>187 AP</td>
                                        </tr>
                                        <tr>
                                            <td>Destroy field</td>
                                            <td>750 AP</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        <div class="col-md-6">
                            <h3>Ap Requirements: Level 1-8</h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td><b>Level</b></td>
                                            <td><b>AP Threshold</b></td>
                                            <td><b>XM Capacity</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>0</td>
                                            <td>3,000</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>10,000</td>
                                            <td>4,000</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>30,000</td>
                                            <td>5,000</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>70,000</td>
                                            <td>6,000</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>150,000</td>
                                            <td>7,000</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>300,000</td>
                                            <td>8,000</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>600,000</td>
                                            <td>9,000</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>1,200,000</td>
                                            <td>10,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <h2>Game Basics</h2>

                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ URL::asset('images/hack_button.png') }}" class="img-responsive center-block" />
                        </div>
                        <div class="col-md-9">
                            <p>Hacking portals gives you items to play. Any color portal will give you items; <span class="smurfs">Resistance</span>, <span class="frogs">Enlightened</span>, <span class="nuetral">Neutral</span>. HACK every portal you can! If you long press the HACK button you can also start a mini-game of glyph matching that can earn you bonus items. (Warning, higher level portals require more glyphs.) You can hack portals once every 5 minutes and a maximum of 4 times every 4 hours (unless you use mods – see below).</p>
                        </div>
                    </div>

                    <div class="row spacer">
                        <div class="col-md-3">
                            <img src="{{ URL::asset('images/deploy_button.png') }}" class="img-responsive center-block" />
                        </div>
                        <div class="col-md-9">
                            <p>You power and reinforce portals by deploying Resonators. Deploying the first or last resonator on a portal earns you AP bonuses! So if you see a Neutral portal, capture it!</p>
                            <p>In addition, resonators have a range from the portal. Try to maximize your range by deploying when the portal is just in reach. Your range is determined by the yellow ring that surrounds your player marker. This makes your resonators harder to destroy!</p>
                        </div>
                    </div>

                    <div class="row spacer">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <h4>Good Range</h4>
                            <img src="{{ URL::asset('images/good_range.png') }}" class="img-responsive center-block" />
                        </div>
                        <div class="col-md-4">
                            <h4>Poor Range</h4>
                            <img src="{{ URL::asset('images/poor_range.png') }}" class="img-responsive center-block" />
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row spacer">
                        <div class="col-md-3">
                            <img src="{{ URL::asset('images/mod_button.png') }}" class="img-responsive center-block" />
                        </div>
                        <div class="col-md-9">
                            <p>Mods (Modifications) change portal properties and reward the player with 125 AP for deployment. Shields, Force Amps, and Turrets protect the portal through mitigation or damage boosts. Heat Sinks and Multihacks reduce the time between hacks (< 5 minutes) and allow you to hack more times before burnout (> 4 hacks / 4 hours). Link Amps increase the link range of portals; they are not useful to most players in cities.</p>
                        </div>
                    </div>

                    <div class="row spacer">
                        <div class="col-md-12">
                            <p>Resonators of Resistance portals can be attacked with XMP Bursters. XMPs create maximum damage right where you stand and dissipate outwards. Beware! When you attack a portal, it will strike back, taking XM! Ultrastrikes concentrate fire to a tight spot. They are specialty items with a high chance of removing portal mods. Use them when standing directly on the center of a portal to maximize the chance of removing enemy mods.</p>
                            <p>As you perform all these actions or get attacked by portals you reduce your Exotic Matter (XM) store. Powercubes provide a portable means to refuel your XM bar. Each powercube provides 1000 XM x Level (L1 = 1000XM, L2, 2000XM, etc). You can only use powercubes at or below your current level.</p>
                            <p>Portal Keys provide a way to remotely access portals, either for viewing or recharging. However, portal keys are most important for linking and fielding which gains you the most AP! Fielding also creates Mind Units (MU) that tie into the game’s story and competition. Around the world and in Los Angeles itself, agents attempt to control the most MU each week.</p>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <h2>Links and Fields</h2>

                    <div class="row">

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection