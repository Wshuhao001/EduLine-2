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

Route::get('/', 'AllCoursesController@index');


Route::get('/course/{id}', 'CourseController@index')->name('course.index');
Route::get('/teacher/{id}/courses', 'AllCoursesController@teacherShow')->name('teacher_courses.index');



Route::group(['middleware' => 'teacher'],function (){
    Route::get('/teacher/courses/manage', 'TeacherController@index')->name('teacher.index');
    Route::get('/teacher/course/create', 'TeacherController@create')->name('teacher.create');
    Route::post('/teacher/course/create', 'TeacherController@store')->name('teacher.store');

});

Route::group(['middleware' => 'auth'],function (){
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'guest'],function (){
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login','AuthController@loginForm');
    Route::post('/login','AuthController@login');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware' => 'admin'], function (){
    Route::resource('/users',  'UserController');
    Route::resource('/courses',  'CourseController');
    Route::resource('/all_courses',  'AllCourseController');
    Route::resource('/categories', 'CategoriesController');
});
