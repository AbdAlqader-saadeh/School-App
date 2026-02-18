@extends('layout.app')

@section('title' , 'create')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="form-control">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input value="{{ old('name') }}" type="text" name = 'name' class="form-control" id="exampleFormControlInput1" placeholder="Enter User Name">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
            <input type="email" value="{{ old('email') }}" class="form-control" name = 'email' id="exampleFormControlTextarea1" rows="3">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <input type="password" value="{{ old('password') }}" class="form-control" name = 'password' id="exampleFormControlTextarea1" rows="3">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">User Type</label>
            <select type="email" name='user_id' class="form-control" >
                @foreach ($Users_type as $user_type)
                    <option value="{{ $user_type->id }}">{{ $user_type->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
@endsection
