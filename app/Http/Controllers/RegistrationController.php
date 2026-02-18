<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{


    public static function register()
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
        ]);

        // store the user data in  database
        return to_route('log.login')->with('status' , 'Registration Successful, Yor can now login');
    }




}
