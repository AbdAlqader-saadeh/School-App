<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends Controller
{
    public static function index()
    {
        return view('log.register');
    }

    public static function processForm(Request $request)
    {
        request()->validate([
            'name' => ['required','max:255','string'],
            'email' => ['required' , 'max:255' , 'string', 'email' , 'unique:users'],
            'password' => ['required' , 'string' , 'min:5'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        return to_route('login.index')->with('status' , 'Registration Successful, Yor can now login');
    }

    public static function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/')->with('status' , 'logout Successful');
    }
}
