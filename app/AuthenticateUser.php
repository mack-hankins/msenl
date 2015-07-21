<?php


namespace Msenl;

use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Contracts\Auth\Guard;
use Msenl\Repositories\UserRepositoryInterface;


class AuthenticateUser {


    /**
     * @var Socialite
     */
    private $socialite;

    /**
     * @var Guard
     */
    private $auth;

    /**
     * @var UserRepositoryInterface
     */
    private $users;

    public function __construct(Socialite $socialite, Guard $auth, UserRepositoryInterface $users)
    {
        $this->socialite = $socialite;
        $this->auth = $auth;
        $this->users = $users;
    }

    public function execute($hasCode, $listener, $provider)
    {

        if (!$hasCode) return $this->getAuthorizationFirst();

        $result = $this->socialite->driver($provider)->user();

        $user = $this->users->findByEmailOrProvider($result, $provider);

        if (!$user) return $listener->register($result, $provider);

        $this->users->updateSocial($user, $result, $provider);

        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user);

    }


    private function getAuthorizationFirst() {

        return $this->socialite->driver('google')->redirect();

    }

}