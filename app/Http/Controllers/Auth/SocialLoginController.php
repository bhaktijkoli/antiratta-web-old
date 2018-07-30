<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Socialite;
use App\User;

class SocialLoginController extends Controller
{
  private $providers = ['facebook', 'google'];

  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
  * Redirect the user to the GitHub authentication page.
  *
  * @return \Illuminate\Http\Response
  */
  public function redirectToProvider($provider)
  {
    if(!in_array($provider, $this->providers)) return "$provider is not supported.";
    return Socialite::driver($provider)->redirect();
  }

  /**
  * Obtain the user information from GitHub.
  *
  * @return \Illuminate\Http\Response
  */
  public function handleProviderCallback($provider)
  {
    if(!in_array($provider, $this->providers)) return "$provider is not supported.";
    $data = Socialite::driver($provider)->user();
    $user = User::where($provider, $data->getId())->first();
    if(!$user) {
      $user = User::where('email', $data->getEmail())->first();
      if(!$user) {
        $user = new User();
        $user->email = $data->getEmail();
        $user->verified = '1';
      }
      $user->$provider = $data->getId();
    }
    $name = explode(" ", $data->getName(), 2);
    if($name[0]) $user->firstname = $name[0];
    if($name[1]) $user->lastname = $name[1];
    $user->save();
    Auth::login($user);
    return redirect()->route('home');
  }
}
