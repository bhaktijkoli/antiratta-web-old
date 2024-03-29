<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;

use Auth;
use App\User;
use App\EmailVerification;
use App\ResponseBuilder;
use App\Mail\VerificationMail;
use App\Mail\WelcomeMail;

use Mail;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/home';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct() {
    $this->middleware('guest')->except(['logout','getAuthenticate']);
  }

  // Login
  public function getLogin() {
    return view('pages.login');
  }
  public function postLogin(Request $request) {
    $this->login($request);
  }

  // Authenticate
  public function getAuthenticate() {
    sleep(1);
    return redirect()->route('home');
  }

  // Signup
  public function postSignup(SignupRequest $request) {
    $user = new User();
    $user->firstname = $request->input('signup_firstname');
    $user->lastname = $request->input('signup_lastname');
    $user->email = $request->input('signup_email');
    $user->password = Hash::make($request->input('signup_password'));
    $user->save();
    $ev = EmailVerification::createToken($user, $user->email);
    Mail::to($user)->send(new VerificationMail($user, $ev));
    Auth::login($user, true);
    return ResponseBuilder::send(true, "", '/authenticate');
  }
  
  // Login Functions
  protected function validateLogin(Request $request)
  {
    $this->validate(
      $request,
      [
        'email' => 'required|string',
        'password' => 'required|string',
      ],
      [
        'email.required' => 'Email Address and password is required.',
        'password.required' => 'Email Address and password is required.',
      ]
    );
  }
}
