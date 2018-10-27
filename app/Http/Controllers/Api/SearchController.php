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
use App\ImageUpload;
use App\ResponseBuilder;

class SearchController extends Controller
{
  public function postCourses(Request $request) {
    $name = $request->input('name');
    $query = Course::query();
    if($name) {
      $query = $query->where('name', 'like', "%$name%");
    }
    $query = $query->orderBy('rating', 'DESC')->get();
    $courses = [];
    foreach ($query as $q) {
      array_push($courses, $q->format());
    }
    return $courses;
  }
}
