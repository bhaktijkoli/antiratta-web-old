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

Route::prefix('admin')->group(function () {
  Route::get('/', 'Admin\DashboardController@getDashboard')->name('admin_dashboard');
  Route::get('/universities', 'Admin\UniversityController@getUniversities')->name('admin_universities');
  Route::get('/courses', 'Admin\CourseController@getCourses')->name('admin_courses');
  Route::get('/courses/edit/{id}', 'Admin\CourseController@getEditCourse')->name('admin_editcourse');
  Route::get('/modules/edit/{id}', 'Admin\ModuleController@getEditModule')->name('admin_editcourse');
});

// Website
Route::get('/', 'HomeController@get')->name('home');
Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::get('/authenticate', 'Auth\LoginController@getAuthenticate')->name('authenticate');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user/verify', 'Auth\LoginController@getVerify')->name('email_verify');
Route::get('/jfk', 'JFKController@getJfK')->name('jfk');
Route::get('/aboutus', 'AboutController@getAbout')->name('aboutus');

Route::get('/settings/{setting}', 'SettingsController@getSetting')->name('setting');

// OAuth
Route::get('login/{provider}', 'Auth\SocialLoginController@redirectToProvider')->name('social_login');
Route::get('login/{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback');

// Api
Route::prefix('api')->group(function () {
  Route::post('user/signup', 'Auth\LoginController@postSignup');
  Route::post('user/login', 'Auth\LoginController@postLogin');
  Route::get('universities/get', 'Api\UniversityController@getUniversities');
  Route::get('branches/get', 'Api\UniversityController@getBranches');
  Route::get('courses/get', 'Api\CourseController@getCourses');
  Route::get('courses/get/{id}', 'Api\CourseController@getCourseByID');
  Route::get('modules/get/{id}', 'Api\ModulesController@getModuleByID');
});

// Admin Api
Route::middleware(['admin'])->prefix('api/admin')->group(function () {
  Route::post('branches/add', 'Api\UniversityController@addBranch');
  Route::post('branches/remove', 'Api\UniversityController@removeBranch');
  Route::post('courses/add', 'Api\CourseController@addCourse');
  Route::post('courses/edit', 'Api\CourseController@editCourse');
  Route::post('courses/remove', 'Api\CourseController@removeCourse');
  Route::post('modules/add', 'Api\ModulesController@addModule');
  Route::post('modules/edit', 'Api\ModulesController@editModule');
  Route::post('modules/remove', 'Api\ModulesController@removeModule');
  Route::post('topics/add', 'Api\TopicsController@addTopic');
});

// Update
Route::get('/update', function() {
  chdir(base_path());
  $res = exec('git reset --hard 2>&1', $output);
  $res = $res . '<br />' . exec('git pull origin master 2>&1', $output);
  return $res;
});
Route::get('/dbreset', function() {
  chdir(base_path());
  $res = exec('php artisan migrate:refresh', $output);
  return implode("<br />", $output);;
});
