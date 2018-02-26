<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\User;
use Illuminate\Http\Request;

class AllCoursesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $courses = Course::all()->where('status', 1);


        return view('courses_list',['categories'=>$categories, 'courses'=>$courses]);
    }

    public function teacherShow($id)
    {

        $teacher = User::where('id',$id)->firstOrFail();
        if ($teacher->status == 0) { abort(404);}
        $courses = Course::where('user_id', $teacher->id)->get();
        return view('teacher_courses',['teacher' => $teacher, 'courses' => $courses]);
    }
}
