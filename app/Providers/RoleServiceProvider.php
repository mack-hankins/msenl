<?php

namespace Msenl\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RoleServiceProvider
 * @package Msenl\Providers
 */
class RoleServiceProvider extends ServiceProvider
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

        $app->bind(\Msenl\Repositories\RoleRepositoryInterface::class, \Msenl\Repositories\Eloquent\RoleRepository::class);
    }
}
