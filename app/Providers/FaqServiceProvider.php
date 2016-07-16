<?php

namespace Msenl\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class FaqServiceProvider
 * @package Msenl\Providers
 */
class FaqServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind(\Msenl\Repositories\FaqRepositoryInterface::class, \Msenl\Repositories\Eloquent\FaqRepository::class);
    }
}
