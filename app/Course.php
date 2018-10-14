<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = "courses";
  public $timestamps = true;

  public function format() {
    $data['id'] = $this->id;
    $data['name'] = $this->name;
    $data['created_by'] = User::where('id', $this->user)->first()->firstname;
    $data['created_at'] = $this->created_at->diffForHumans();
    return $data;
  }

  public function deleleAll() {
    $this->forceDelete();
  }
}
