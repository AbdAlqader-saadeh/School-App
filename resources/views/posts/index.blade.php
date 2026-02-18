@extends('layout.app')

@section('title' , 'Posts')

@section('content')
        <h3>Hello {{ Auth::user()->name }} ,</h3>
        <hr>
        <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posts By</th>
                <th scope="col">Created By</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name}}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        @can('viewAny' , $post)
                            <a class="btn btn-info" href="{{ route('posts.show' , $post->id) }}">View</a>
                        @endcan
                        @can('update' , $post)
                            <a class="btn btn-primary" href="{{ route('posts.edit' , $post->id) }}">Edit</a>
                        @endcan
                        @can('delete' , $post)
                            <form style="display: inline" action="{{ route('posts.destroy' , $post->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Do you want to Delete this Post ? ')" class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @can('create')
        <a href="{{ route('posts.create') }}" class="btn btn-success text-center">Create Post</a>
    @endcan
@endsection


