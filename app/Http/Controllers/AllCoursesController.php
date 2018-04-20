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
        $courses = Course::where('status', 1)->simplePaginate(9);


        return view('courses_list',['categories'=>$categories, 'courses'=>$courses]);
    }

    public function teacherShow($id)
    {

        $teacher = User::where('id',$id)->firstOrFail();
        if ($teacher->status == 0) { abort(404);}
        $courses = Course::where('user_id', $teacher->id)->get();
        return view('teacher_courses',['teacher' => $teacher, 'courses' => $courses]);
    }

    public function categoryFilter($category_id)
    {

        $categories = Category::all();
        $category = Category::where('id', $category_id)->firstOrFail();

        $courses = Course::where([
            ['status', 1],
            ['category_id', $category_id]
        ])->simplePaginate(9);

        return view('courses_category',['courses' => $courses, 'category' => $category, 'categories' => $category]);
    }
}
