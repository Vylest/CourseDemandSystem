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

Route::group(['middleware' => ['web']], function ($id) {
    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    Route::auth();

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/home', 'UserController@login');
        Route::get('/', 'UserController@login');
        //Route::get('auth/login', 'UserController@login');
    });

    Route::get('auth/logout', array('uses' => 'UserController@logout', 'as' => 'auth.logout'));

    Route::group(['middleware' => ['auth']], function () {
        // students
        Route::resource('students', 'StudentController');

        //courses
        Route::get('courses/get', 'CourseController@getCourses');
        Route::resource('courses', 'CourseController');


        //program
        Route::get('programs/{id}/info', 'ProgramController@info');
        Route::resource('programs', 'ProgramController');

        //program requirements
        Route::resource('programs.requirements', 'RequirementController', ['parameters'=>'singular', 'except'=>['show','index']]);

        // plan of study
        Route::resource('students.plans', 'PlanOfStudyController', ['parameters'=>'singular']);

        //enrollments
        Route::resource('students.plans.enrollments', 'EnrollmentController', ['only' =>['update','destroy']]);

        // semesters
        Route::resource('semesters', 'SemesterController', ['except'=>['show']]);

        //update enrollment
        Route::post('students/{sid}/plans/{pid}/enrollment/{eid}', 'PlanOfStudyController@updateEnrollment');
        Route::delete('students/{sid}/plans/{pid}/enrollment/{eid}', 'PlanOfStudyController@destroyEnrollment');

        // admin panel
        Route::get('admin', 'HomeController@admin');

        Route::group(['middleware' => ['id']], function ($id) {
            Route::get('users/{id}/editAccount', 'UserController@editAccount');
            Route::patch('users/{id}/updateAccount', 'UserController@updateAccount');
            Route::get('users/{id}/account', array('uses' => 'UserController@manageAccount', 'as' => 'user.account'));
            Route::get('users/{id}/changeMyPassword', array('uses' => 'UserController@changeAccountPassword', 'as' => 'user.accountPassword'));
            Route::patch('users/{id}/updatePassword', 'UserController@updatePassword');
        });

        Route::group(['middleware'=>['admin']], function () {
            Route::resource('users', 'UserController');
            Route::get('users/{id}/password', array('uses' => 'UserController@changePassword', 'as' => 'users.password'));
        });

        Route::get('/', 'HomeController@dashboard');
        Route::get('dashboard', ['uses'=>'HomeController@dashboard', 'as' => 'dashboard']);
    });
});
