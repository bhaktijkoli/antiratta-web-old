<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddModuleRequest;

use Auth;
use App\University;
use App\Branch;
use App\Course;
use App\Module;
use App\ResponseBuilder;

class ModulesController extends Controller
{
  // Add module
  public function addModule(AddModuleRequest $request) {
    $module = new Module();
    $module->name = $request->input('module_name', '');
    $module->description = $request->input('module_description', '');
    $module->course = $request->input('module_course', '');
    $module->created_by = Auth::user()->id;
    $module->updated_by = Auth::user()->id;
    $module->save();
    return ResponseBuilder::send(true, "", '/');
  }
}
