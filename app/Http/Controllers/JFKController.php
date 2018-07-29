<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JFKController extends Controller
{
  public function getJfK() {
    return view('pages.jfk');
  }
}
