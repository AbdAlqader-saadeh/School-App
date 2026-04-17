@extends('layout.app')

@section('title' , 'Register')

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


<form class="form-control" action="{{ route('register.process') }}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" value="{{ old('email') }}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword2">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">User Type</label>
    <select type="" name='user_type' class="form-control" >
        @foreach ($Users_type as $user_type)
            <option value="{{ $user_type->id }}" {{ old('user_type') == $user_type->id ? 'selected' : '' }}>{{ $user_type->name }}</option>
        @endforeach
    </select>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
<hr>
<a href="{{ route('login.index') }}" class="btn btn-info">Already have an account?</a>

@endsection
