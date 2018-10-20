<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddModuleRequest;
use App\Http\Requests\EditModuleRequest;

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

  // Edit module
  public function editModule(EditModuleRequest $request) {
    $module = Module::where('id', $request->input('module', '-1'))->first();
    if(!$module) abort(404);
    $module->name = $request->input('module_name', '');
    $module->description = $request->input('module_description', '');
    $module->updated_by = Auth::user()->id;
    $module->save();
    return ResponseBuilder::send(true, "", '/');
  }

  // Remove module
  public function removeModule(Request $request) {
    $module = Module::where('id', $request->input('module', '-1'))->first();
    if(!$module) abort(404);
    $module->deleleAll();
    return ResponseBuilder::send(true, "", '/');
  }

  // Get Modules By ID
  public function getModuleByID($id) {
    $module = Module::where('id', $id)->first();
    if(!$module) abort(404);
    return $module->format();
  }
}
