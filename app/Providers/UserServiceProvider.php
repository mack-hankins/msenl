<?php

namespace Msenl\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class UserServiceProvider
 * @package Msenl\Providers
 */
class UserServiceProvider extends ServiceProvider
{

    public function register()
    {
        $app = $this->app;

        $app->bind(\Msenl\Repositories\UserRepositoryInterface::class, \Msenl\Repositories\Eloquent\UserRepository::class);
    }
}
