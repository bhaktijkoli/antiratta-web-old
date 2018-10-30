<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest', ['only' => ['getIndexGuest']]);
    $this->middleware('auth', ['only' => ['getIndexAuth']]);
  }

  public function getIndex() {
    return view('pages.index');
  }
  public function getIndexGuest() {
    return view('pages.index');
  }
  public function getIndexAuth() {
    return view('pages.index');
  }
}
