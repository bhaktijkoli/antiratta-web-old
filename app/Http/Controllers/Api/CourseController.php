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
use App\ResponseBuilder;

class CourseController extends Controller
{
  // Add course
  public function addCourse(AddCourseRequest $request) {
    $course = new Course();
    $course->name = $request->input('course_name', '');
    $course->price = $request->input('course_price', '');
    $course->branch = $request->input('course_branch', '');
    $course->shortname = $request->input('course_shortname', '');
    $course->created_by = Auth::user()->id;
    $course->updated_by = Auth::user()->id;
    $course->save();
    return ResponseBuilder::send(true, "", '/');
  }
  // Edit course
  public function editCourse(EditCourseRequest $request) {
    $course = Course::where('id', $request->input('course', '-1'))->first();
    if(!$course) abort(404);
    $course->name = $request->input('course_name', '');
    $course->price = $request->input('course_price', '');
    $course->shortname = $request->input('course_shortname', '');
    $course->updated_by = Auth::user()->id;
    $course->save();
    return ResponseBuilder::send(true, "", '/');
  }

  // Remove course
  public function removeCourse(Request $request) {
    $course = Course::where('id', $request->input('course','-1'))->first();
    if(!$course) abort(404);
    $course->deleleAll();
    return ResponseBuilder::send(true, "", '/');
  }

  // Get All Courses of branch
  public function getCourses(Request $request) {
    $courses = Course::where('branch', $request->input('branch', '-1'))->get();
    $data = [];
    foreach ($courses as $course) {
      array_push($data, $course->format());
    }
    return $data;
  }

  // Get Course Details
  public function getCourseByID($id) {
    $course = Course::where('id', $id)->first();
    if(!$course) abort(404);
    return $course->formatDetails();
  }
}
