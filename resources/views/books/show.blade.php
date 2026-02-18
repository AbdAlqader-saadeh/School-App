@extends('layout.app')

@section('title', 'Course : ')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">

            <div class="card text-center shadow-sm h-100 border-0 bg-light">

                <img style="opacity: 0.6; max-height: 250px; width: 100%; object-fit: cover;"
                     src="{{ asset('images/' . $book->image) }}"
                     class="card-img-top rounded-top" alt="Course Image">

                <div class="card-body d-flex flex-column p-4">

                    <h4 class="card-title fw-bold">{{ $book->name }}</h4>
                    <p class="card-text text-muted mb-3">{{ $book->user->name }}</p>

                    <hr class="my-3 w-75 mx-auto opacity-50"> <h5 class="card-title mt-2">{{ $book->title }}</h5>

                    <p class="card-text flex-grow-1 text-secondary px-md-3">
                        {{ $book->text }}
                    </p>

                </div>

            </div>
            </div>
    </div>
</div>
@endsection
