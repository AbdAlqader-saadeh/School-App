<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public static function login()
    {
        return view('log.login');
    }

    public static function processlogin(Request $request)
    {
        request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $credential = $request->only('email' , 'password');

        if (Auth::attempt($credential))
        {
            return to_route('posts.index');
        }

        return back()->withInput()->with('status' , 'Invalid credential');
    }

    public static function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/')->with('status' , 'logout Successful');
    }
}
