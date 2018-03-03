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

        return redirect()->route('teacher.edit',$course->id);
    }

    public static function courseCheck($id)
    {
        $my_course = Course::where('id',$id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();

        if ($my_course == null) {abort(404);}

        return $my_course;

    }

    public function edit($id)
    {
        $my_course = static::courseCheck($id);
        return view('course_edit',['course' => $my_course]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'lesson_title.*' => 'required|string|size:50',
            'lesson.*' =>  'mimes:mp4,avi'
        ]);

        $my_course = static::courseCheck($id);

        foreach ($request->lesson as $tutor){
            $my_course->uploadLesson($tutor);
        }

        return redirect()->route('teacher.index');

    }



}
