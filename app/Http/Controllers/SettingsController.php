<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
  public $settings_links = ['personal-info', 'email', 'password'];
  public $settings_names = ['Personal Information', 'Email', 'Password'];

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function getSetting($setting)
  {
    if(!in_array($setting, $this->settings_links)) return abort(404);
    $title = $this->settings_names[array_search($setting, $this->settings_links)];
    return view('pages.settings')->with([
      'title' => $title,
      'setting' => $setting,
      'settings_names' => $this->settings_names,
      'settings_links' => $this->settings_links,
    ]);
  }
}
