@extends('layout.app')

@section('title' , 'Edit')

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

<form action="{{ route('posts.update' , $post->id) }}" method="POSt" class="form-control">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input value="{{ old('title') }}"  type="text" name='title' value="{{ $post->title }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Title">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea  class="form-control" name='description' id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
            <select  type="email" name='post_creator' class="form-control" >
            @foreach ($users as $user)
                <option value="{{ $user->id }}" @if ($user->id == $post->user_id) selected @endif>{{ $user->name }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
