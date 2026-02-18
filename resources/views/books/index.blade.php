@extends('layout.app')

@section('title' , 'My Courses')

@section('content')


<h3>Hi, {{ Auth::user()->name }}!</h3>
<h4 style="margin-top: 10px;display: inline-block">Course overview</h4>
<hr>

<div class="container mb-4 ms-5" >
    <form action="{{ route('books.index') }}" style="width: 400px;display: inline-block"  method="GET" class="d-flex ms-5">
        <input type="text" name="search" class="form-control me-2" placeholder="ابحث عن اسم الكتاب..." value="{{ request('search') }}" >
        <button type="submit" class="btn btn-primary">بحث</button>

        @if(request('search'))
            <a href="{{ route('books.index') }}" class="btn btn-secondary ms-2">إلغاء</a>
        @endif
        @can('create' , $user)
            <a href="{{ route('users.create') }}" class="btn btn-secondary ms-2">Create</a>
        @endcan
    </form>

</div>


<div class="row justify-content-center">
    @foreach ($books as $book)
        <div class="card mt-3 mb-3" style="width: 18rem;display:inline-block">
            <img style="opacity: 1; max-height: 200px; width: 100%; object-fit: cover;"
                    src="{{ asset('images/' . $book->image) }}"
                    class="card-img-top rounded-top" alt="Course Image">
            <div class="card-body">
                <h5 class="card-title">{{ $book->name }}</h5>
                <p class="card-text">{{ $book->user->name }}</p>
                @can('view', $book)
                    <a href="{{ route('books.show' , $book->id) }}" class="btn btn-outline-primary">View Course</a>
                @endcan
            </div>
        </div>
    @endforeach
</div>
@endsection
