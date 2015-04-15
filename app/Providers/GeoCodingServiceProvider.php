<?php


namespace Msenl\Providers;


use Illuminate\Support\ServiceProvider;

class GeoCodingServiceProvider extends ServiceProvider{

    public function register()
    {
        $app = $this->app;

        $app->bind('Msenl\Repositories\GeoCodingRepositoryInterface', 'Msenl\Repositories\GeoCoding\GeoCodingRepository');
    }
}