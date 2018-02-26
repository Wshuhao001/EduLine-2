<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $courses = Course::where('user_id', Auth::user()->id)->get();
        return view('my_courses',['courses' => $courses]);
    }

    public function create()
    {
        $categories = Category::pluck('title','id')->all();
        return view('course_create',['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'             =>  'required|min:10|max:56|unique:courses',
            'short_description' =>  'required|min:10|max:120',
            'description'       =>  'required|min:25|max:500',
            'category_id'       =>  'required|numeric',
            'image'             =>  'image',
            'demo'              =>  'mimes:mp4,avi',
            'price'             =>  'required|numeric'
        ]);

        $course = Course::add($request->all());
        $course->uploadImage($request->image);
        $course->uploadDemo($request->demo);
        return redirect()->route('teacher.index');
    }
}
