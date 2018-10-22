<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCourseRequest;
use App\Http\Requests\EditCourseRequest;

use Auth;
use App\ResponseBuilder;

class AuthController extends Controller
{
  public function getAuth()
  {
    if(Auth::check()) {
      return Auth::user();
    }
    return null;
  }
}
