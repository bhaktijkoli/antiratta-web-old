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

class CourseController extends Controller
{
  // Add course
  public function addCourse(AddCourseRequest $request) {
    $course = new Course();
    $course->name = $request->input('course_name', '');
    $course->description = $request->input('course_description', '');
    $course->price = $request->input('course_price', '');
    $course->branch = $request->input('course_branch', '');
    $course->shortname = $request->input('course_shortname', '');
    $course->sem = $request->input('course_sem', '1');
    $course->color = $request->input('course_color', 'blue');
    $branch = Branch::where('id', $course->branch)->first();
    $branch->addSem($course->sem);
    $course->created_by = Auth::user()->id;
    $course->updated_by = Auth::user()->id;
    if($request->course_image) {
      $img = new ImageUpload();
      $img->uploadImage($request->course_image, 'courses', $course->getSlug());
      $course->image = $img->id;
    }
    $course->save();
    return ResponseBuilder::send(true, "", '/');
  }
  // Edit course
  public function editCourse(EditCourseRequest $request) {
    $course = Course::where('id', $request->input('course', '-1'))->first();
    if(!$course) abort(404);
    $course->name = $request->input('course_name', '');
    $course->description = $request->input('course_description', '');
    $course->price = $request->input('course_price', '');
    $course->shortname = $request->input('course_shortname', '');
    $course->sem = $request->input('course_sem', '1');
    $course->color = $request->input('course_color', 'blue');
    $branch = Branch::where('id', $course->branch)->first();
    $branch->addSem($course->sem);
    $course->updated_by = Auth::user()->id;
    if($request->course_image) {
      $img = new ImageUpload();
      $img->uploadImage($request->course_image, 'courses', $course->getSlug());
      $course->image = $img->id;
    }
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

  // Get Course Details by Query
  public function getCourseDetails(Request $request) {
    $branch = Branch::where('university','1')->where('shortname', $request->input('branch'))->first();
    if(!$branch) abort(404);
    $course = Course::where('branch', $branch->id)->where('name', str_replace("-", " ", $request->input('course')))->first();
    if(!$course) abort(404);
    return $course->formatDetails();
  }
}
