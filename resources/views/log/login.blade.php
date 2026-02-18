@extends('layout.app')

@section('title' , 'Login')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{ route('login.process') }}" method="POST" class="form-control">
    @csrf
        <div class="mb-3">
            <h2>Login</h2>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input value="{{ old('email') }}"  type="email" name='email' class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Passwrod</label>
            <input  type="password" name='password' class="form-control" id="exampleFormControlInput1" placeholder="Enter Your password">
        </div>

        <button type="submit" class="btn btn-success">Login</button>
        <hr >
        <a href="{{ route('log.register') }}">Create new account</a>
    </form>
@endsection
