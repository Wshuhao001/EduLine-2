<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);

        User::add($request->all());


        return redirect('/login');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'name'       =>  'required',
            'password'   =>  'required'
        ]);

        if (Auth::attempt([
            'name' => $request->get('name'),
            'password' => $request->get('password')
        ]))
        {
            return redirect('/');
        }

        return redirect()->back()->with('status', 'Неправильний логін або пароль');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
