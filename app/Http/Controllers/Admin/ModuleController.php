<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Course;
use App\Module;
use App\Topic;

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

  public function getEditTopic($id)
  {
    $topic = Topic::where('id', $id)->first();
    if(!$topic) abort(404);
    return view('pages.admin.topics', ['topic'=>$topic]);
  }
}
