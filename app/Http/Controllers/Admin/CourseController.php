<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Course;

class CourseController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function getCourses()
  {
    return view('pages.admin.courses');
  }
  public function getEditCourse($id)
  {
    $course = Course::where('id', $id)->first();
    if(!$course) abort(404);
    return view('pages.admin.courses', ['course'=>$course]);
  }
}
