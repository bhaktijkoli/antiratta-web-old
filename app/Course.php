<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Course extends Model
{
  protected $table = "courses";
  public $timestamps = true;

  public function format() {
    $data['id'] = $this->id;
    $data['name'] = $this->name;
    $data['shortname'] = $this->shortname;
    $data['price'] = $this->price;
    $data['sem'] = $this->sem;
    if(Auth::check()) {
        $data['created_by'] = User::where('id', $this->created_by)->first()->firstname;
        $data['created_at'] = $this->created_at->diffForHumans();
        $data['updated_by'] = User::where('id', $this->updated_by)->first()->firstname;
        $data['updated_at'] = $this->updated_at->diffForHumans();
    }
    return $data;
  }

  public function formatDetails() {
    $data = $this->format();
    $modules = [];
    $moduleQueries = Module::where('course', $this->id)->get();
    foreach ($moduleQueries as $m) {
      array_push($modules, $m);
    }
    $data['modules'] = $modules;
    return $data;
  }

  public function deleleAll() {
    $this->forceDelete();
  }
}
