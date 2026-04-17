@extends('layout.app')

@section('title' , 'Students')

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
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td>{{ $student->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


