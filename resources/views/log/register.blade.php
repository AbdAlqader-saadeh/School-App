@extends('layout.app')

@section('title' , 'Login')

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

<form action="{{ route('register.process') }}" method="POST" class="form-control">
    @csrf
        <div class="mb-3">
            <h5>Login Page</h5>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input value="{{ old('name') }}"  type="text" name='name' class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input value="{{ old('email') }}"  type="email" name='email' class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input  type="password" name='password' class="form-control" id="exampleFormControlInput1" placeholder="Enter Your password">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
            <input  type="password" name='password' class="form-control" id="exampleFormControlInput1" placeholder="Confirm password">
        </div>

        <button type="submit" class="btn btn-success">Sign Up</button>
        <hr >
        <a href="{{ route('log.login') }}">Already have an account?</a>
    </form>
@endsection
