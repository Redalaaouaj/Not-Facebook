@extends('layouts.app')
@section('content')

<form method="post" action="{{route('posts.update',$post->id)}}">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{old('title',$post->title)}}">
        @error('title')
            <p class="text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" name="description" class="form-control" value="{{old('description',$post->description)}}">
        @error('description')
            <p class="text text-danger">{{$message}}</p>
        @enderror
    </div>
    <select class="form-select my-3" name="user_id">
        <option selected value="{{auth()->user()->id}}"> {{auth()->user()->name}} </option>
    </select>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
</form>
<!-- @if($errors->any())
    <div class="alert alert-danger my-3">
        @foreach($errors->all() as $e)
            <p>{{$e}}</p>
        @endforeach
    </div>
@endif -->

@endsection