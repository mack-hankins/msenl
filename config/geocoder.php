<?php

/**
 * This file is part of the GeocoderLaravel library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    // Providers get called in the chain order given here.
    // The first one to return a result will be used.
    'providers' => [
        'Geocoder\Provider\GoogleMapsProvider' => ['en_EN', 'US', $ssl = false, env('GOOGLE_API_GEOCODER')],
        'Geocoder\Provider\FreeGeoIpProvider'  => null,
    ],
    'adapter'  => 'Geocoder\HttpAdapter\CurlHttpAdapter',
];
