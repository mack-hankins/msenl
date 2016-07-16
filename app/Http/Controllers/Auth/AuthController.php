<?php namespace Msenl\Http\Controllers\Auth;

use Msenl\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Msenl\Http\Requests\RegisterRequest;
use Msenl\Support\AuthenticateUser;
use Illuminate\Http\Request;
use Msenl\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Guard;
use Breadcrumbs;

/**
 * Class AuthController
 * @package Msenl\Http\Controllers\Auth
 */
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
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * @var
     */
    protected $auth;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;


    /**
     * @param Request $request
     * @param UserRepositoryInterface $userRepository
     * @param Guard $auth
     */
    public function __construct(Request $request, UserRepositoryInterface $userRepository, Guard $auth)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->request = $request;
        $this->userRepository = $userRepository;
        $this->auth = $auth;
    }

    /**
     * @param AuthenticateUser $authenticateUser
     * @param null $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @internal param Request $request
     */
    public function login(AuthenticateUser $authenticateUser, $provider = null)
    {

        return $authenticateUser->execute($this->request->has('code'), $this, $provider);

    }


    /**
     * @param $user
     * @param $userData
     * @param $provider
     * @return $this
     */
    public function register($user, $userData, $provider)
    {

        $this->request->session()->put('temp_id', $user->id);

        $title = 'Register';

        $description = 'This is the first step of the verification process.';

        $breadcrumbs = Breadcrumbs::render('register');

        $levels = collect(range(0, 16))->toArray();

        return view('pub.register')->with(compact('title', 'description', 'breadcrumbs', 'userData', 'provider', 'levels'));

    }


    /**
     * @param RegisterRequest $registerRequest
     * @return mixed
     */
    public function submit(RegisterRequest $registerRequest)
    {
        $user_id = $this->request->session()->get('temp_id');

        $user = $this->userRepository->update($user_id, $registerRequest->input());

        $this->request->session()->forget('temp_id');

        $this->auth->login($user, true);

        return $this->userHasLoggedIn($user);

    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userHasLoggedIn($user)
    {
        \Session::flash('message', 'Welcome, ' . $user->agent);

        return redirect('/');
    }

}
