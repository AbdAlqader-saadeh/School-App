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

    
<form class="form-control" action="{{ route('login.process') }}" method="POST">
    @csrf
    <h5 class="tex-center">
        Hi, Welcome to The University of Jordan E-Learning Portal
    </h5>
    <br>
    <p>Enter your details to log in your account</p>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
<hr>
<a href="{{ route('log.register') }}">Create new account</a>

@endsection
