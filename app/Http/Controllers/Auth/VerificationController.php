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

class VerificationController extends Controller
{
  // Verify
  public function getVerify(Request $request) {
    $token = $request->input('token', '');
    $user = EmailVerification::verifyToken($token);
    if(!$user) return redirect('/');
    Mail::to($user)->send(new WelcomeMail($user));
    return view('pages.verify');
  }
}
