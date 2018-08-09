<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
  public function getBranches($id) {
    $branches = Branch::where('university', $id)->get();
    return $branches;
  }
  public function addBranch(AddBranchRequest $request) {
    $branch = new Branch();
    $branch->name = $request->input('branch_name');
    $branch->university = $request->input('branch_university', '-1');
    $branch->save();
    return ResponseBuilder::send(true, "", '/');
  }
}
