<?php


namespace Msenl\Support;

use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Contracts\Auth\Guard;
use Msenl\Repositories\UserRepositoryInterface;
use narutimateum\Toastr\Facades\Toastr;

/**
 * Class AuthenticateUser
 * @package Msenl\Support
 */
class AuthenticateUser
{


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

    /**
     * AuthenticateUser constructor.
     * @param Socialite $socialite
     * @param Guard $auth
     * @param UserRepositoryInterface $users
     */
    public function __construct(Socialite $socialite, Guard $auth, UserRepositoryInterface $users)
    {
        $this->socialite = $socialite;
        $this->auth = $auth;
        $this->users = $users;
    }

    /**
     * @param $hasCode
     * @param $listener
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function execute($hasCode, $listener, $provider)
    {

        if (!$hasCode) {
            return $this->getAuthorizationFirst();
        }

        $result = $this->socialite->driver($provider)->user();

        $user = $this->users->findByEmailOrProvider($result, $provider);

        if (!$user) {
            $user = $this->users->newSocial($result, $provider);
        }

        if (empty($user->agent)) {
            return $listener->register($user, $result, $provider);
        }

        $this->users->updateSocial($user, $result, $provider);

        $this->auth->login($user, true);

        Toastr::success(
            'You have logged in successfully.',
            'Welcome Back!'
        );

        return $listener->userHasLoggedIn($user);

    }


    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function getAuthorizationFirst()
    {

        return $this->socialite->driver('google')->redirect();

    }
}
