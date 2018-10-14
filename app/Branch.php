<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  protected $table = "branches";
  public $timestamps = true;

  public function format() {
    $data['id'] = $this->id;
    $data['name'] = $this->name;
    $data['shortname'] = $this->shortname;
    $data['created_by'] = User::where("id", $this->user)->first()->firstname;
    $data['created_at'] = $this->created_at->diffForHumans();
    return $data;
  }
}
