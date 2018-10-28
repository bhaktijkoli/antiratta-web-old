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
  Route::get('/modules/edit/{id}', 'Admin\ModuleController@getEditModule')->name('admin_editmodule');
  Route::get('/topics/edit/{id}', 'Admin\ModuleController@getEditTopic')->name('admin_edittopic');
});

// Website
Route::get('/', 'IndexController@getIndex')->name('home');
Route::get('/login', 'IndexController@getIndex')->name('login');
Route::get('/authenticate', 'Auth\LoginController@getAuthenticate')->name('authenticate');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user/verify', 'Auth\LoginController@getVerify')->name('email_verify');
Route::get('/courses', 'IndexController@getIndex')->name('courses');
Route::get('/course/{university}/{branch}/{course}', 'IndexController@getIndex')->name('course-details');
Route::get('/jfk', 'IndexController@getIndex')->name('jfk');
Route::get('/aboutus', 'IndexController@getIndex')->name('aboutus');
Route::get('/cart', 'IndexController@getIndex')->name('cart');

Route::get('/settings/{setting}', 'IndexController@getIndex')->name('setting');

// OAuth
Route::get('login/{provider}', 'Auth\SocialLoginController@redirectToProvider')->name('social_login');
Route::get('login/{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback');

// Api
Route::prefix('api')->group(function () {
  Route::get('auth', 'Api\AuthController@getAuth');
  Route::post('user/signup', 'Auth\LoginController@postSignup');
  Route::post('user/login', 'Auth\LoginController@postLogin');
  Route::get('universities/get', 'Api\UniversityController@getUniversities');
  Route::get('branches/get', 'Api\UniversityController@getBranches');
  Route::get('courses/get', 'Api\CourseController@getCourses');
  Route::post('courses/get/details', 'Api\CourseController@getCourseDetails');
  Route::get('courses/get/{id}', 'Api\CourseController@getCourseByID');
  Route::get('modules/get/{id}', 'Api\ModulesController@getModuleByID');
  Route::get('topics/get/{id}', 'Api\TopicsController@getTopicByID');
  Route::post('search/courses', 'Api\SearchController@postCourses');

  Route::post('cart/toggle', 'Api\CartController@postToggleCart');
  Route::get('cart/get', 'Api\CartController@getCart');
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
  Route::post('topics/edit', 'Api\TopicsController@editTopic');
});

// Update
Route::get('/update', function() {
  chdir(base_path());
  $res = exec('git reset --hard 2>&1', $output);
  $res = $res . '<br />' . exec('git pull origin master 2>&1', $output);
  return $res;
});
