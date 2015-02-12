<?php namespace Msenl\Http\Controllers\Auth;

use Msenl\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\App;
use Msenl\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar, UserRepositoryInterface $user)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->user = $user;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function login()
    {
        // get data from input
        $code = Input::get('code');

        // get google service
        $googleService = OAuth::consumer('Google');

        // check if code is valid

        // if code is provided get user data and sign in
        if (!empty($code)) {

            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

            $user = $this->user->findByEmail($result['email']);

            if (!$user) {
                return Redirect::action('Msenl\Controllers\AuthController@register')->with('register', $result);
            }

            $user->avatar = $result['picture'];
            $user->save();

            Auth::loginUsingId($user->id);

            return Redirect::intended('/');

        } // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return Redirect::to((string)$url);
        }
    }

    public function register()
    {

        $register = Session::pull('register');

        if ($register OR Session::has('_old_input')) {
            $title = Title::put('Register');
            $description = 'This is the first step of the verification process.';

            $levels = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16'];

            return View::make('pub.register', compact('title', 'description', 'register', 'levels'));
        }

        App::abort('404');
    }

    public function submit()
    {
        $user = new \User;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->plusprofile = Input::get('link');
        $user->agent = Input::get('agent');
        $user->faction = Input::get('faction');
        $user->level = Input::get('level');
        $user->avatar = Input::get('avatar');
        if ($user->save()) {
            Auth::login($user);

            return Redirect::to('/')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::back()->withErrors($user->errors());
        }
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::back();
    }

}
