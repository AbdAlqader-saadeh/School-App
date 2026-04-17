@extends('layout.app')

@section('title' , 'My Courses : E-Learing Portal')

@section('content')


<h3>Hi, {{ Auth::user()->name }}!</h3>
<h4 style="margin-top: 10px;display: inline-block">Course overview</h4>
<br>
<hr>

<div class="container mb-4 ms-5" >
    <form action="{{ route('books.index') }}" style="width: 400px;display: inline-block"  method="GET" class="d-flex ms-5">
        @can('create' , $user)
            <a href="{{ route('users.create') }}" class="btn btn-primary ms-2 me-2">Create</a>
        @endcan
        <button type="submit" class="btn bg-secondary me-2">Search</button>
        <input type="text" name="search" class="form-control me-2" placeholder="Search for book name..." value="{{ request('search') }}" >

        @if(request('search'))
            <a href="{{ route('books.index') }}" class="btn btn-secondary ms-2 me-2">إلغاء</a>
        @endif
    </form>

</div>


<div class="row justify-content-center">
    @foreach ($books as $book)
        <div class="card mt-3 mb-3 m-2" style="width: 18rem;display:inline-block">
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
