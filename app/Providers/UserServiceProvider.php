<?php


namespace Msenl\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    public function register()
    {
        $app = $this->app;

        $app->bind('Msenl\Repositories\UserRepositoryInterface', 'Msenl\Repositories\Eloquent\UserRepository');
    }


}