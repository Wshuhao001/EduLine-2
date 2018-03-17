<?php

namespace App\Http\Controllers;

use App\Course;
use App\Words;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WordsController extends Controller
{
    public function addForm( $course_id)
    {

        if (Course::where('id',$course_id)->first() == null)
        {
            abort(404);
        }

        $words = Words::all()->where('course_id', $course_id);

        $course = Course::all()->firstWhere('id', $course_id);


        return view('words.words_add',['words'=>$words, 'course'=> $course]);
    }

    public function update(Request $request, $course_id)
    {


        $this->validate($request,[
            'word.*' => 'required|string|max:50',
            'translate.*' =>  'required|string|max:50'
        ]);



        $deletedWords = Words::where('course_id', $course_id)->delete();


        for($i=0; $i < count($request->word); $i++){
            $newWord = new Words;
            $newWord->word = $request->get('word')[$i];
            $newWord->translate = $request->get('translate')[$i];
            $newWord->course_id = $course_id;
            $newWord->author_id = Auth::user()->id;
            $newWord->save();
        }

        return redirect()->back();
    }

    public function show($course_id)
    {

        $course = Course::where('id', $course_id)->firstOrFail();

        $words = Words::all()->where('course_id', $course_id);


        return view('opened_course.allWords',['words'=>$words, 'course'=>$course]);
    }


}
