<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCourseRequest;

use Auth;
use App\University;
use App\Branch;
use App\Course;
use App\ResponseBuilder;

class CourseController extends Controller
{
  public function addCourse(AddCourseRequest $request) {
    $course = new Course();
    $course->user = Auth::user()->id;
    $course->name = $request->input('course_name', '');
    $course->price = $request->input('course_price', '');
    $course->branch = $request->input('course_branch', '');
    $course->save();
    return ResponseBuilder::send(true, "", '/');
  }
}
