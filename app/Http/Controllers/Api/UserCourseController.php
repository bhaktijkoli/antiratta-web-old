<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCourseRequest;
use App\Http\Requests\EditCourseRequest;

use Auth;
use App\University;
use App\Branch;
use App\Course;
use App\UserCourse;
use App\ResponseBuilder;

class UserCourseController extends Controller
{
  public function postGetCourses(Request $request) {
    $data = [];
    $ucs = UserCourse::where('user', Auth::user()->id)->get();
    foreach ($ucs as $uc) {
      $c = Course::find($uc->course);
      if(!$c) $uc->forceDelete();
      array_push($data, $c->format());
    }
    return $data;
  }
}
