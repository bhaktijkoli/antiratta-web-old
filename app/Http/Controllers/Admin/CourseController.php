<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
