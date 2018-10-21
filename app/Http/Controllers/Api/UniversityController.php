<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\University;
use App\Branch;
use App\Http\Requests\AddBranchRequest;
use App\ResponseBuilder;

class UniversityController extends Controller
{
  public function getUniversities() {
    $universities = University::getNames();
    $scs = University::getScs();
    $data = array();
    foreach ($universities as $university) {
      if($university == 'None') continue;
      $un['name'] = $university;
      $un['sc'] = $scs[array_search($university, $universities)];
      array_push($data, $un);
    }
    return $data;
  }
  public function getBranches(Request $request) {
    $branches = Branch::where('university', $request->input('university', '-1'))->get();
    $data = [];
    foreach ($branches as $branch) {
      array_push($data, $branch->format());
    }
    return $data;
  }
  public function addBranch(AddBranchRequest $request) {
    $branch = new Branch();
    $branch->user = Auth::user()->id;
    $branch->name = $request->input('branch_name');
    $branch->university = $request->input('branch_university', '-1');
    $branch->shortname = $request->input('branch_shortname', '');
    $branch->sems = json_encode([]);
    $branch->save();
    return ResponseBuilder::send(true, "", '/');
  }
  public function removeBranch(Request $request) {
    $branch = Branch::where('id', $request->input('id', '-1'))->first();
    if(!$branch) abort("404");
    $branch->forceDelete();
    return ResponseBuilder::send(true, "", '/');
  }
}
