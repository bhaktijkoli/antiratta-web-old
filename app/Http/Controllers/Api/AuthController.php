<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCourseRequest;
use App\Http\Requests\EditCourseRequest;

use App\Http\Requests\ChangeEmailRequest;

use Auth;
use Mail;
use App\User;
use App\EmailVerification;
use App\Mail\VerificationMail;
use App\ResponseBuilder;

class AuthController extends Controller
{
  public function getAuth()
  {
    if(Auth::check()) {
      return Auth::user();
    }
    return null;
  }

  public function postChangeEmail(ChangeEmailRequest $request) {
    $ev = EmailVerification::createToken($request->input('new_email'));
    Mail::to($request->input('new_email'))->send(new VerificationMail(Auth::user(), $ev));
    return ResponseBuilder::send(true, '', '');
  }
}
