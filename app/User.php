<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasAccess() {
      if($this->role > 0) return true;
      else return false;
    }

    public function isAdmin() {
      if($this->role == 1) return true;
      return false;
    }

    public function isEditor() {
      if($this->role > 0 && $this->role <= 2) return true;
      return false;
    }
}
