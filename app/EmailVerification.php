<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
  protected $table = "emails_verification";

  public static function createToken($email) {
    $ev = \App\EmailVerification::where('email', $email)->first();
    if($ev) $ev->forceDelete();
    $ev = new \App\EmailVerification;
    $ev->email = $email;
    $ev->token = str_random(60);
    $ev->save();
    return $ev;
  }

  public static function verifyToken($token) {
    $ev = \App\EmailVerification::where('token', $token)->first();
    if($ev) {
      $user = User::where('email', $ev->email)->first();
      $user->verifed = '1';
      $user->save();
      $ev->forceDelete();
      return $user;
    }
    return false;
  }
}
