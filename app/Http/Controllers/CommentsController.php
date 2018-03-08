<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'course_review' => 'required'
        ]);


        $comment = new Comment;
        $comment->text = $request->get('course_review');
        $comment->course_id = $request->get('course_id');
        $comment->user_id = Auth::user()->id;

        $comment->save();


        return redirect()->back();
    }
}
