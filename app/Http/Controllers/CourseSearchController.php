<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseSearchController extends Controller
{
    public function show(Request $request)
    {
        $this->validate($request,[
            'search' => 'required|max:30'
        ]);

         $search = $request->search;

        $search_courses = Course::where([
            ['description', 'LIKE', '%' . $search . '%'],
            ['status',1]
        ])->get();

        return view('search',['courses'=> $search_courses, 'search' => $search]);
    }
}
