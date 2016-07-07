<?php namespace Msenl\Http\Controllers\Auth;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Msenl\Http\Controllers\Controller;
use Msenl\Http\Requests\RegisterRequest;
use Msenl\Repositories\UserRepositoryInterface;
use Msenl\User;
use Msenl\AuthenticateUser;
use Title;

class AuthController extends Controller
{


    /**
     * @var Guard
     */
    private $auth;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;


    /**
     * @param UserRepositoryInterface $userRepository
     * @param Guard $auth
     */
    public function __construct(UserRepositoryInterface $userRepository, Guard $auth)
    {

        $this->middleware('guest', ['except' => 'logout']);
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @param AuthenticateUser $authenticateUser
     * @param null $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login(Request $request, AuthenticateUser $authenticateUser, $provider = null)
    {

        return $authenticateUser->execute($request->has('code'), $this, $provider);

    }


    /**
     * @param $userData
     * @param $provider
     * @return $this
     */
    public function register($userData, $provider)
    {

        $title = Title::put('Register');
        $description = 'This is the first step of the verification process.';

        $levels = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16'];

        return view('pub.register')->with(compact('title', 'description', 'userData', 'provider', 'levels'));

    }


    /**
     * @param RegisterRequest $registerRequest
     * @return mixed
     */
    public function submit(RegisterRequest $registerRequest)
    {

        $user = $this->userRepository->store($registerRequest->all());

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
