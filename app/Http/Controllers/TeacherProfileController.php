<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('teacher.index',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request->get('user_id'))->firstOrFail();

        if ($request->get('image') != null)
        {
            $image = $user->uploadAvatar($request->get('image'));
            $user->image = $image;
        }


        $user->firstName = $request->get('firstName');
        $user->surname = $request->get('surname');
        $user->description = $request->get('description');

        $user->save();

        return redirect()->route('profile.index')
            ->with('status', 'Ваші данні успішно обновлені');


    }

}





