<?php

namespace Msenl\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Diego1araujo\Titleasy\Titleasy as Title;
use Toin0u\Geocoder\GeocoderFacade as Geocoder;

class EnemyPortalsController extends Controller
{

    public function index($agent)
    {

        $content = Cache::rememberForever($agent, function () use ($agent) {
        

            $portals = \Enemyportals::Owner($agent)->get();

            return $portals;
        });

        $markers = Cache::rememberForever($agent . '-markers', function () use ($content) {
        

            foreach ($content as $newmarker) {
                if (!$newmarker->dead) {
                    $marker[] = [$newmarker->title, $newmarker->lat, $newmarker->lng, '<div><a href="http://maps.google.com/maps?q=' . $newmarker->lat . ',' . $newmarker->lng . '" target="_blank">Map It</a></div>'];
                }
            }

            return json_encode($marker);
        });

        $title = Title::put(ucfirst($agent) . '\'s Portals');

        $description = 'We want to kill all these portals';

        return View::make('pub.enemyportals', compact('content', 'markers', 'title', 'description'));

    }

    private function geocode($lat, $lng)
    {
        try {
            $response = Geocoder::reverse($lat, $lng);

            return $response;
        } catch (\Exception $e) {
        // No exception will be thrown here
        }
    }

    public function submit()
    {
        return View::make('pub.enemyportals_submit');
    }

    public function update()
    {
        $owner = strtolower(Input::get('owner'));
        if (Input::hasFile('json_file')) {
            \Enemyportals::Owner($owner)->delete();

            $file = Input::file('json_file')->move(app_path() . '/storage/app', $owner . '.json');

            $contents = json_decode(file_get_contents($file));

            $contents = $contents->portals->idOthers->bkmrk;

            foreach ($contents as $portal) {
                $latlng = explode(',', $portal->latlng);
                $response = $this->geocode($latlng[0], $latlng[1]);

                $enemyport = new \Enemyportals;
                $enemyport->owner = $owner;
                $enemyport->title = $portal->label;
                $enemyport->lat = $latlng[0];
                $enemyport->lng = $latlng[1];
                $enemyport->city = $response['city'];
                $enemyport->state = $response['cityDistrict'];
                $enemyport->zip = $response['zipcode'];
                $enemyport->save();
            }

            Cache::pull($owner);
            Cache::pull($owner . '-markers');

            return Redirect::action('Msenl\Controllers\Pub\EnemyPortalsController@index', $owner);
        }

    }

    public function remove($owner, $id)
    {
        $portal = \Enemyportals::find($id);
        $portal->dead = true;
        $portal->save();
        Cache::pull($owner);
        Cache::pull($owner . '-markers');

        return Redirect::back();
    }

    public function undoremove($owner, $id)
    {
        $portal = \Enemyportals::find($id);
        $portal->dead = false;
        $portal->save();
        Cache::pull($owner);
        Cache::pull($owner . '-markers');

        return Redirect::back();
    }
}
