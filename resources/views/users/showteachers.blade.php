@extends('layout.app')

@section('title' , 'Teachers')

@section('content')
        <hr>
        <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created By</th>
                <th scope="col">Updated at</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($teachers as $teacher)
                <tr>
                    <th scope="row">{{ $teacher->id }}</th>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->created_at }}</td>
                    <td>{{ $teacher->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


