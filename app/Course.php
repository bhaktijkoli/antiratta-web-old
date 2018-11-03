<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

use App\Branch;
use App\University;
use App\ImageUpload;

class Course extends Model
{
  protected $table = "courses";
  public $timestamps = true;

  public function format() {
    $data['id'] = $this->id;
    $data['name'] = $this->name;
    $data['url'] = str_replace(" ", "-" ,strtolower($this->name));
    $data['shortname'] = strtoupper($this->shortname);
    $data['price'] = $this->price;
    $data['price_format'] = number_format($this->price);
    $data['sem'] = $this->sem;
    $data['image'] = $this->getImage();
    $data['color'] = $this->color;
    $data['description'] = $this->description;
    $data['rating'] = $this->rating;
    $data['branch'] = Branch::where('id', $this->branch)->first()->format();
    $data['university'] = University::getFormat(1);
    $data['enrolled'] = $this->getUserEnrollment();
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

  public function getSlug() {
    $branch = Branch::where('id', $this->branch)->first();
    if(!$branch) abort(404);
    $bn = strtolower($branch->shortname);
    $un = strtolower(University::getScs()[$branch->university]);
    $cn = strtolower($this->shortname);
    return "$un-$bn-$cn";
  }

  public function getImage() {
    $image = ImageUpload::where('id', $this->image)->first();
    if(!$image) return "";
    return $image->getUrl();
  }

  public function getUserEnrollment() {
    if(!Auth::check()) return 0;
    $uc = UserCourse::where("user", Auth::user()->id)->where('course', $this->id)->first();
    if($uc) return 1;
    return 0;
  }
}
