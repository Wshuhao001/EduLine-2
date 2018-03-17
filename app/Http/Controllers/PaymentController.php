<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->text = $request->get('ik_x_course');
        $comment->course_id = 1;
        $comment->user_id = 1;

        $comment->save();
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
