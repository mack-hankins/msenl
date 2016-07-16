<?php

namespace Msenl\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

/**
 * Class PurifierMiddleware
 * @package Msenl\Http\Middleware
 */
class PurifierMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $input = $request->all();

        //Purify input requests
        if(count($input) > 0)
        {
            $htmlPurifierConfig = \HTMLPurifier_Config::createDefault();
            $htmlPurifierConfig->set('Core.Encoding', 'UTF-8');
            $htmlPurifierConfig->set('HTML.Doctype', 'HTML 4.01 Transitional');

            if (defined('PURIFIER_CACHE')) {
                $htmlPurifierConfig->set('Cache.SerializerPath', PURIFIER_CACHE);
            } else {
                # Disable the cache entirely
                $htmlPurifierConfig->set('Cache.DefinitionImpl', null);
            }
            $filterHTMLPurifier = new \HTMLPurifier($htmlPurifierConfig);

            $this->PurifyList($request, $input, $filterHTMLPurifier);
        }

        return $next($request);
    }

    /**
     * @param $request
     * @param $input
     * @param $filterHTMLPurifier
     */
    public function PurifyList($request, $input, $filterHTMLPurifier)
    {
        foreach ($input as $key => $value) {

            if (is_array($value)) {
                $this->PurifyList($request, $value, $filterHTMLPurifier);
            } else {

                $init = $value;

                $value = $filterHTMLPurifier->purify($value);

                //Clean the data
                if (!empty($init) && $init != $value) {
                    Log::warning('Htmlpurifier: ' . $init);

                    abort(401, "Htmlpurifier request data is not correct: " . $init);
                }
            }
        }
    }

}
