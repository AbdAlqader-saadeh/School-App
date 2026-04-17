@extends('layout.app')

@section('title', 'Course : ' . $book->name)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">

            <div class="card text-center shadow-sm h-100 border-0 bg-body-tertiary">
            
                <img style="opacity: 0.6; max-height: 250px; width: 100%; object-fit: cover;"
                     src="{{ asset('images/' . $book->image) }}"
                     class="card-img-top rounded-top" alt="Course Image">

                <div class="card-body d-flex flex-column p-4">

                    <h4 class="card-title fw-bold" style="color: var(--bs-emphasis-color) !important;">{{ $book->name }}</h4>
                    <p class="card-text text-muted mb-3" style="color: var(--bs-emphasis-color) !important;">{{ $book->user->name }}</p>

                    <hr class="my-3 w-75 mx-auto opacity-50" style="color: var(--bs-emphasis-color) !important;"> <h5 class="card-title mt-2">{{ $book->title }}</h5>

                    <p class="card-text flex-grow-1 text-secondary px-md-3" style="color: var(--bs-emphasis-color) !important;">
                        {{ $book->text }}
                    </p>

                </div>

            </div>
            </div>
    </div>
</div>
@endsection
