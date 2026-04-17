<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    use AuthorizesRequests;

public function index(Request $request)
{
    $user = Auth::user();

    $query = \App\Models\Book::query();

    if ($user->user_type == '3') {

    } 
    elseif ($user->user_type == '2') {

        $query->where('books.user_id', $user->id); 
    } 
    elseif ($user->user_type == '1') {

        $myCourseIds = $user->courses()->pluck('book_id')->toArray(); 
        $query->whereIn('books.id', $myCourseIds);
    }

    // كود البحث
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('title', 'LIKE', "%{$search}%");
        });
    }

    $books = $query->latest()->get();
    return view('books.index', compact('books', 'user'));
}

public function show($Id)
{


    $book = Book::findOrFail($Id);

    if (Auth::check())
    {
        if (Auth::user()->cannot('view', $book)) {
            abort(403, 'ليس لديك صلاحية لعرض هذا الكتاب');
        }
    } else {

        abort(403, 'يجب تسجيل الدخول كطالب');
    }

    return view('books.show', ['book' => $book]);
    

}
}
