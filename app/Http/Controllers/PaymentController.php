<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Course;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function store(Request $request)
    {
        $course_id = $request->get('ik_x_course');
        $buyer_id = $request->get('ik_x_login');

        $buyer = User::where('id', $buyer_id)->firstOrFail();

        $buyer->buyCourse($course_id);

        $course = Course::where('id', $course_id)->firstOrFail();

        $course->buy($buyer_id);
        $course->save();


        $teacher_id = $course->user_id;

        $teacher = User::where('id', $teacher_id)->firstOrFail();
        $teacher->money = $teacher->money + $course->price * 0.9;
        $teacher->save();


    }

    public function good()
    {
        return view('payment.good');
    }

    public function bad()
    {
        return view('payment.bad');
    }


    public function waiting()
    {
        return view('payment.waiting');
    }

}
