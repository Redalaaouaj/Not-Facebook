@extends('layouts.app')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<div class="text-center">
    <div class="row my-3 d-flex">
        <form action="" class="form">
            <div class="row filter col2">
                <div class="col">
                    <input type="text" class="form-control border-primary" name="title" id="title" placeholder="Search Not Facebook" value="{{ request()->query('title')}}" style="width: 115%;">
                </div>
                <div class="col col2">
                    <input type="submit" value="Search" class="btn btn-secondary ">
                    <a href="{{route('posts.show')}}" class="btn btn-light">Clear</a>
                </div>
            </div>
        </form>
    </div>

    <div class="p-3 mb-2 bg-dark ">
      <h3 class="text text-light"> My posts</h3> 
    </div>


    <a href="{{route('posts.create')}}" class="btn btn-dark my-3">Create Post</a>
    @foreach($posts as $index => $p)
    <div class="card text-center mb-2">
        <div class="card-header">
            {{$index+1}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$p->title}}</h5>
            <p class="card-text">{{$p->description}}</p>
            <a href="{{route('posts.edit',$p->id)}}" class="btn btn-warning">Edit</a>
            <form action="{{route('posts.destroy',$p->id)}}" method="post" style="display: inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
        <div class="card-footer text-body-secondary">
            {{$p->updated_at->format('d/m/Y')}}
        </div>
    </div>
    @endforeach
</div>
@endsection