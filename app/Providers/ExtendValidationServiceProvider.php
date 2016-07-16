<?php

namespace Msenl\Providers;

use Illuminate\Support\ServiceProvider;
use PragmaRX\ZipCode\Contracts\ZipCode;

/**
 * Class ExtendValidationServiceProvider
 * @package Msenl\Providers
 */
class ExtendValidationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @param ZipCode $zipCode
     */
    public function boot(ZipCode $zipCode)
    {
        $this->app['validator']->extend('zip', function($attribute, $value, $parameters, $validator) use ($zipCode) {
            $zip = $zipCode->find($value);
            return $zip['success'];
        });

        $this->app['validator']->extend('begins_with', function($attribute, $value, $parameters, $validator) use ($zipCode) {
            return $value[0] == $parameters[0];
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
