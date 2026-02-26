<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User_type;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        if (Gate::allows('is_admin' , Auth::user()))
        {

            $Users_type = User_type::get();

            return view('users.create' , ['Users_type' => $Users_type]);
        }
        else
            return 'You Are Not an admin';
    }

    public function showstudents()
    {
        if (Gate::allows('is_admin' , Auth::user()))
        {
            $students = User::where('user_id' , 1)->get();

            return view('users.showstudents' , ['students' => $students]);
        }
        else
            return 'You Are Not An Admin';
    }

    public function showteachers()
    {
        if (Gate::allows('is_admin' , Auth::user()))
        {
            $teachers = User::where('user_id' , 2)->get();

            return view('users.showteachers' , ['teachers' => $teachers]);
        }
        else
            return 'You Are Not An Admin';
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
