@extends('_layouts.master')

@section('styles')

@endsection

@section('content')

    @include('_partials.page-header')
    <div class="container">
        <div class="row">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="alert alert-info">
                        Please check Intel first to make sure the portal is still active. There are two links on the
                        table (scroll over on mobile) to view "Intel It" and "Map It" links.
                    </div>
                    <div id="map" style="width: 100%; height: 400px;"></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Intel</th>
                                    <th>Map</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            @foreach($content as $portal)
                                @if($portal->dead)
                                <tr class="strikeout">
                                    @else
                                    <tr>
                                    @endif
                                    <td>{{ $portal->title }}</td>
                                    <td>{{ $portal->city }}</td>
                                    <td>{{ $portal->state }}</td>
                                    <td>{{ $portal->zip }}</td>
                                    <td>
                                        <a href="https://www.ingress.com/intel?ll={{ $portal->lat }},{{ $portal->lng }}&z=17&pll={{ $portal->lat }},{{ $portal->lng }}"
                                           target="_blank">Intel It</a></td>
                                    <td><a href="http://maps.google.com/maps?q={{ $portal->lat }},{{ $portal->lng }}"
                                           target="_blank">Map
                                            It</a></td>
                                    <td>
                                        @if($portal->dead)
                                            <a href="{{ URL::action('App\Controllers\Pub\EnemyPortalsController@undoremove', [$portal->owner, $portal->id]) }}">Undo</a>
                                        @else
                                            <a href="{{ URL::action('App\Controllers\Pub\EnemyPortalsController@remove', [$portal->owner, $portal->id]) }}">Mark
                                                Dead</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        function initialize() {

            var locations = {{$markers}};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                center: new google.maps.LatLng(32.367965, -88.612468),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][3] + locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }

        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
@endsection