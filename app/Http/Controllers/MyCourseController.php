<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class MyCourseController extends Controller
{
    public function index($id,$lesson_id)
    {



        $course = Course::where('id',$id)->firstOrFail();
        $lessons = $course->getLesson();

        if ($lesson_id > count($lessons)-1){
            abort(404);
        }

        return view('open_course',['course'=>$course, 'lessons'=>$lessons, 'lesson_id'=>$lesson_id]);
    }
}
