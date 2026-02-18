<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {

        $query = Book::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%"); // هذا السطر إضافي للبحث في العنوان أيضاً
        }

        $books = $query->latest()->get();
        $user = Auth::user();

        return view('books.index', compact('books' , 'user'));
    }

public function show($Id)
{

    $book = Book::findOrFail($Id);


    if (auth('student')->check()) {
        if (auth('student')->user()->cannot('view', $book)) {
            abort(403, 'ليس لديك صلاحية لعرض هذا الكتاب');
        }
    } else {

        abort(403, 'يجب تسجيل الدخول كطالب');
    }

    return view('books.show', ['book' => $book]);
}
}
