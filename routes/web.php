<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Website
Route::get('/', 'HomeController@get')->name('home');
Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::get('/user/verify', 'Auth\LoginController@getVerify')->name('email_verify');
Route::get('/jfk', 'JFKController@getJfK')->name('jfk');
Route::get('/aboutus', 'AboutController@getAbout')->name('aboutus');

// Api
Route::prefix('api')->group(function () {
  Route::post('user/signup', 'Auth\LoginController@postSignup');
  Route::post('user/login', 'Auth\LoginController@postLogin');
});

// Update
Route::get('/update', function() {
  chdir(base_path());
  $res = exec('git reset --hard 2>&1', $output);
  $res = $res . '<br />' . exec('git pull origin master 2>&1', $output);
  return $res;
});
