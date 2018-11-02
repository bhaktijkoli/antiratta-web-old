<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
  protected $table = "user_courses";
  public $timestamps = true;

  public function user()
  {
    return $this->hasOne('App\User');
  }
  public function course()
  {
    return $this->belongsTo('App\Course');
  }
}
