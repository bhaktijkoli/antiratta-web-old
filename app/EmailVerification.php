<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
  protected $table = "emails_verification";

  public static function createToken($user, $email) {
    $ev = EmailVerification::where('email', $email)->where('user', $user->id)->first();
    if($ev) $ev->forceDelete();
    $ev = new EmailVerification;
    $ev->user = $user->id;
    $ev->email = $email;
    $ev->token = str_random(60);
    $ev->save();
    return $ev;
  }

  public static function verifyToken($token) {
    $ev = EmailVerification::where('token', $token)->first();
    if($ev) {
      $user = User::find($ev->user);
      $user->email = $ev->email;
      $user->verified = '1';
      $user->save();
      $ev->forceDelete();
      return $user;
    }
    return null;
  }
}
