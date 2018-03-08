<?php

namespace App\Http\Controllers;

use App\Course;
use App\Words;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function addForm($course_id)
    {
        $words = Words::all();

        $course = Course::all()->firstWhere('id', $course_id);


        return view('words.words_add',['words'=>$words, 'course'=> $course]);
    }

    public function update()
    {

    }
}
