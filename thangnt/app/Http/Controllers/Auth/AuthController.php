<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
// use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Input;
use DB;
use App\User;
use Session;

// use Auth;
// use Illuminate\Routing\Controller;
//use Illuminate\Contracts\Auth\Registrar;

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

	protected $redirectTo = LOGIN_PATH;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$this->auth->login($this->registrar->create($request->all()));

		return redirect($this->redirectPath());
	}

	// Custom Authenticate 

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{

		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(LoginRequest $request)
	{
		$this->validate($request, [
			'email' => 'required', 'password' => 'required|min:8|max:32'
		]);

		$credentials = $request->only('email', 'password');

		$credentials = array(
								'email'		=>	$credentials['email'],
								'password'	=>	$credentials['password'],
								'enable'	=>	1);

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			//$this->getPathByRole()

			return redirect()->intended(TOP_PAGE);
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}

	public function getPathByRole()
	{
		$user = $this->auth->user();

		switch ($user->role_id) {
			case ROLE_BOSS:
			case ROLE_ADMIN:

				$redirectTo = $this->redirectPath(LIST_USER_PATH);

				break;
			case ROLE_EMPLOYEE:

				$redirectTo = $this->redirectPath(DETAIL_EMPLOYEE_PATH);

				break;

			default:
				$redirectTo = $this->redirectPath(DETAIL_EMPLOYEE_PATH . $user->id . '/detail');
				break;
		}

		return $redirectTo;
	}

	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage()
	{

		return MESSAGE_USER_CREDENTIALS_ERROR;
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{

		$this->auth->logout();

		return redirect(LOGIN_PATH);
	}


	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath($path_success)
	{
		// dd($path_success);
		if (property_exists($this, 'redirectPath'))
		{
			// if login fail

			return $this->redirectPath;
		}

		// if login success

		return property_exists($this, 'redirectTo') ? $this->redirectTo : $path_success;
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	// public function loginPath()
	// {
	// 	dump(property_exists($this, 'loginPath'));
	// 	dd($this, 'login path', Session::all());

	// 	return property_exists($this, 'loginPath') ? $this->loginPath : '/user/list';
	// }
}
