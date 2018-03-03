<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class MyCourseController extends Controller
{
    public function index($id)
    {

        $course = Course::where('id',$id)->firstOrFail();


        return view('open_course',['course'=>$course]);
    }
}
