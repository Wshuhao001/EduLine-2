<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id)
    {
        $course = Course::where('id',$id)->where('status',1)->firstOrFail();
        $relates = Course::where('category_id', $course->category_id)
            ->where('id','!=',$course->id)
            ->take(2)
            ->get();

        return view('course',['course' => $course, 'relates' => $relates]);
    }
}
