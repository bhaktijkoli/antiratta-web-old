<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function getUniversities()
  {
    return view('pages.admin.universities');
  }
}
