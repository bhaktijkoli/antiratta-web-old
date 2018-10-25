<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
use File;
use Image;

class ImageUpload extends Model
{
  public function getUrl() {
    return url("public/$this->filename");
  }

  public function uploadImage($file, $filepath, $filename = '') {
    $this->checkDirs($filepath);
    if($filename == '') {
      $filename = str_random(30) . uniqid() . '.jpg';
    } else {
      $filename = "$filename.jpg";
    }
    $this->filename = "$filepath/$filename";
    $this->created_by = Auth::user()->id;
    $filepath = public_path("public/$filepath/$filename");
    Image::make($file)->save($filepath);
    $this->save();
  }
  public function deleteImage() {
    $filename = $this->image;
    $filepath = public_path('public/events/' .$filename);
    File::delete($filepath);
    $thumb = public_path('public/events/thumb/' .$filename);
    File::delete($thumb);
  }
  public function checkDirs($filepath) {
    $path = public_path("public/$filepath");
    File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
  }
}
