<?php

namespace Msenl\Repositories\GeoCoding;

use Msenl\Repositories\GeoCodingRepositoryInterface;
use Toin0u\Geocoder\Facade\Geocoder;

class GeoCodingRepository implements GeoCodingRepositoryInterface
{

    public function reverse($address)
    {
        try {
            $geocode = Geocoder::geocode($address);
            // The GoogleMapsProvider will return a result
            return $geocode;
        } catch (\Exception $e) {
            // No exception will be thrown here
            //return $e->getMessage();
            return null;
        }
    }
}
