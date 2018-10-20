<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Module extends Model
{
  protected $table = "modules";
  public $timestamps = true;

  public function format() {
    $data['id'] = $this->id;
    $data['name'] = $this->name;
    return $data;
  }

  public function deleleAll() {
    $this->forceDelete();
  }
}
