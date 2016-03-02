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
    Route::post('users/{id}/destroy', 'UserController@destroy');
    Route::post('users/{id}/update', 'UserController@update');
    Route::resource('users', 'UserController');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::get('users/{id}/password', array('uses' => 'UserController@changePassword', 'as' => 'users.password'));
});

Route::group(['middleware' => ['id','auth','web']], function ($id) {
    Route::get('users/{id}/editAccount', 'UserController@editAccount');
    Route::patch('users/{id}/updateAccount', 'UserController@updateAccount');
    Route::get('users/{id}/account', array('uses' => 'UserController@manageAccount', 'as' => 'users.account'));
    Route::get('users/{id}/changeMyPassword', array('uses' => 'UserController@changeAccountPassword', 'as' => 'users.accountPassword'));
    Route::patch('users/{id}/updatePassword', 'UserController@updatePassword');
});

Route::get('auth/logout', array('uses' => 'UserController@logout', 'as' => 'auth.logout'));

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
