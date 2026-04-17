<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public static function login()
    {
        return view('log.index');
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
            // dd($credential);
            
            return to_route('books.index');
        }

        return back()->withInput()->with('status' , 'Invalid credential');
    }


}
