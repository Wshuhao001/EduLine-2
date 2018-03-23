<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $this->validate($request,[
            'firstName' => 'string|max:20|min:3',
            'surname' => 'string|max:20|min:3',
            'description' => 'max:150|min:10'
        ]);

        $user = User::where('id', $request->get('user_id'))->firstOrFail();

        $user->firstName = $request->get('firstName');
        $user->surname = $request->get('surname');
        $user->description = $request->get('description');

        $user->save();

        return redirect()->route('profile.index')
            ->with('status', 'Ваші данні успішно обновлені');


    }


    public function uploadAvatar(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|dimensions:ratio=1/1|dimensions:width=100,height=100'

        ]);

        $user = Auth::user();
        $image = $request->image;

        $user->uploadAvatar($image);

        return redirect()->route('profile.index');
    }

}





