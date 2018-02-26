<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllCourseController extends Controller
{
    public function index()
    {

        $courses = Course::all();
        return view('admin.all_courses',['courses'=>$courses]);
    }

    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('all_courses.index');
    }
}
