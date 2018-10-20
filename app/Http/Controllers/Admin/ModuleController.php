<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Course;
use App\Module;

class ModuleController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function getEditModule($id)
  {
    $module = Module::where('id', $id)->first();
    if(!$module) abort(404);
    return view('pages.admin.modules', ['module'=>$module]);
  }
}
