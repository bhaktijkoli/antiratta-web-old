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
    $data['description'] = $this->description;
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
    $topics = [];
    $topicQueries = Topic::where('module', $this->id)->get();
    foreach ($topicQueries as $t) {
      array_push($topics, $t);
    }
    $data['topics'] = $topics;
    return $data;
  }

  public function deleleAll() {
    $this->forceDelete();
  }
}
