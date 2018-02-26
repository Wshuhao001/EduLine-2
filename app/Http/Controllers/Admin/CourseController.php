<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {

        $courses = Course::all()->where('status', 0);
        return view('admin.courses',['courses'=>$courses]);
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $course->status = 1;
        $course->save();
        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('courses.index');
    }
}
