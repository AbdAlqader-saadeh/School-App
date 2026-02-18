
@extends('layout.app')

@section('title' , 'show')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Title : {{ $post->title }}</h5>
            <p class="card-text">Description : {{$post->description }}</p>
        </div>
    </div>
    <div class="card mt-3">
        <h5 class="card-header">Name : {{ $post->user ? $post->user->name : 'Not Found'}}</h5>
        <div class="card-body">
            <h5 class="card-title">Email : {{$post->user ? $post->user->email : 'Not Found'}}</h5>
            <p class="card-text">Created at : {{$post->user ? $post->user->created_at : 'Not Found'}}</p>
        </div>
    </div>
@endsection
