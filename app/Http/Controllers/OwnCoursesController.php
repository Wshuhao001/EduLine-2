<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class OwnCoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('own_courses',['courses' => $courses]);
    }
}
