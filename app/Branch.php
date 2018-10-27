<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Branch extends Model
{
  protected $table = "branches";
  public $timestamps = true;

  public function format() {
    $data['id'] = $this->id;
    $data['name'] = $this->name;
    $data['shortname'] = strtoupper($this->shortname);
    if(Auth::check()) {
      $data['created_by'] = User::where("id", $this->user)->first()->firstname;
      $data['created_at'] = $this->created_at->diffForHumans();
    }
    return $data;
  }

  public function addSem($sem) {
    $sems = json_decode($this->sems);
    if(!in_array($sem, $sems)) {
      array_push($sems, $sem);
    }
    $this->sems = json_encode($sems);
    $this->save();
  }
}
