<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('admin.users',['users'=>$users]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }
}
