<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }

  public function getDashboard()
  {
    return view('pages.admin.dashboard');
  }
}
