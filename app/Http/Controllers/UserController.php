<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User_type;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    public function create()
    {


        $Users_type = User_type::get();

        return view('users.create' , ['Users_type' => $Users_type]);
    }
    public function showstudents()
    {
        $students = User::where('user_id' , 1)->get();

        return view('users.showstudents' , ['students' => $students]);
    }

    public function showteachers()
    {
        $teachers = User::where('user_id' , 2)->get();

        return view('users.showteachers' , ['teachers' => $teachers]);
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'user_id' => $request->user_id,
        ]);

        return to_route('books.index');
    }

}
