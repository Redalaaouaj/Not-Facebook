@extends('layouts.app')
@section('content')

<form method="post" action="{{route('posts.store')}}">
    @csrf

    <div class="mb-3 ">
        <label for="title" class="form-label">Title</label>
        <input type="text" value="{{old('title')}}" name="title" class="form-control">
        @error('title')
            <p class="text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" value="{{old('description')}}" name="description" class="form-control">
        @error('description')
            <p class="text text-danger">{{$message}}</p>
        @enderror
    </div>
    <select class="form-select my-3" name="user_id">
        <option selected value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
    <!-- @if($errors->any())
    <div class="alert alert-danger my-3">
        @foreach($errors->all() as $e)
        <p>{{$e}}</p>
        @endforeach
    </div>
    @endif -->
</form>
@endsection