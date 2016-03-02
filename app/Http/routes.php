<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web','guest']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
    Route::get('/login', 'UserController@login');
});

Route::group(['middleware' => ['web','auth']], function () {
    //Route::auth();

    // students
    Route::resource('students', 'StudentController');

    //courses
    Route::resource('courses', 'CourseController');

    //program
    Route::resource('program', 'ProgramController');

    // plan of study
    Route::resource('plan', 'PlanOfStudyController');

    //user
    Route::resource('user', 'UserController');
});

Route::group(['middleware'=>['web','admin']], function () {
    Route::post('users/{id}/destroy', 'UsersController@destroy');
    Route::post('users/{id}/update', 'UsersController@update');
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/edit', 'UsersController@edit');
    Route::get('users/{id}/password', array('uses' => 'UsersController@changePassword', 'as' => 'users.password'));
});

Route::get('auth/logout', array('uses' => 'UsersController@logout', 'as' => 'auth.logout'));

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
