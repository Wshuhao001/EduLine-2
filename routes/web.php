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
    Route::get('/course/category/{category_id}', 'AllCoursesController@categoryFilter')->name('course.category');
    Route::get('/teacher/{id}/courses', 'AllCoursesController@teacherShow')->name('teacher_courses.index');


    Route::get('course/{course_id}/words', 'WordsController@show')->name('course.words'); // Має бути першим ніж індекс ??

    Route::get('/course/{id}/{lesson_id}', 'MyCourseController@index')->name('course.lessons');

    Route::get('/good_payment', 'PaymentController@good');

    Route::get('/bad_payment', 'PaymentController@bad');

    Route::get('/waiting_payment', 'PaymentController@waiting');

    Route::get('/payment', 'PaymentController@store');






    Route::group(['middleware' => 'teacher'],function (){
        Route::get('/teacher/courses/manage', 'TeacherController@index')->name('teacher.index');
        Route::get('/teacher/course/create', 'TeacherController@create')->name('teacher.create');
        Route::post('/teacher/course/create', 'TeacherController@store')->name('teacher.store');
        Route::get('/teacher/course/{id}/addLessons', 'TeacherController@edit')->name('teacher.edit');
        Route::put('/teacher/course/{id}/addLessons', 'TeacherController@update')->name('teacher.update');
        Route::get('/teacher/courses/{course_id}/words', 'WordsController@addForm')->name('words.addForm');
        Route::put('/teacher/courses/{course_id}/words', 'WordsController@update')->name('words.update');

    });

    Route::group(['middleware' => 'auth'],function (){
        Route::get('/logout', 'AuthController@logout');
        Route::post('/comment', 'CommentsController@store');

    });

    Route::group(['middleware' => 'guest'],function (){
        Route::get('/register', 'AuthController@registerForm');
        Route::post('/register', 'AuthController@register');
        Route::get('/login','AuthController@loginForm')->name('login');
        Route::post('/login','AuthController@login');
    });

    Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware' => 'admin'], function (){
        Route::resource('/users',  'UserController');
        Route::resource('/courses',  'CourseController');
        Route::resource('/all_courses',  'AllCourseController');
        Route::resource('/categories', 'CategoriesController');
    });


