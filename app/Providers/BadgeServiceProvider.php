<?php

namespace Msenl\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class BadgeServiceProvider
 * @package Msenl\Providers
 */
class BadgeServiceProvider extends ServiceProvider
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

        $app->bind(\Msenl\Repositories\BadgeRepositoryInterface::class, \Msenl\Repositories\Eloquent\BadgeRepository::class);
    }
}
