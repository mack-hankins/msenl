<?php namespace Msenl\Http\Controllers\Auth;

use Socialize;
use Msenl\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Msenl\Http\Requests\RegisterRequest;
use Msenl\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Diego1araujo\Titleasy\Titleasy as Title;

class AuthController extends Controller {

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
     * @param UserRepositoryInterface $UserRepository
     */
    public function __construct(Guard $auth, Registrar $registrar, UserRepositoryInterface $UserRepository)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->user = $UserRepository;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function login()
    {
        // get data from input
        $code = Input::get('code');

        // if code is provided get user data and sign in
        if (!empty($code))
        {

            $result = Socialize::with('google')->user();

            $user = $this->user->findByEmail($result->email);

            if (!$user)
            {
                return Redirect::action('Auth\AuthController@register')->with('register', $result);
            }

            $user->avatar = $result->avatar;
            $user->save();

            Auth::loginUsingId($user->id);

            return Redirect::intended('/');

        } // if not ask for permission first
        else
        {
            // get googleService authorization
            return Socialize::with('google')->redirect();

        }
    }

    public function register()
    {

        $register = Session::pull('register');

        //dd($register);

        $title = Title::put('Register');
        $description = 'This is the first step of the verification process.';

        $levels = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16'];

        return View::make('pub.register', compact('title', 'description', 'register', 'levels'));

    }

    /**
     * @param RegisterRequest $request
     * @return mixed
     */
    public function submit(RegisterRequest $request)
    {

        $user = $this->user->store($request->all());

        Auth::login($user);

        return Redirect::to('/')->with('message', 'Thanks for registering!');

    }


}
