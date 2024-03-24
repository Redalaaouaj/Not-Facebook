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
                    <a href="{{route('posts.index')}}" class="btn btn-light">Clear</a>
                </div>
            </div>
        </form>
        <!-- <form action="" class="form align-self-baseline" style="display: inline;">
            <input type="hidden" name="clear">
            <input type="submit" value="Clear" class="btn btn-light">
        </form> -->
    </div>

    @foreach($posts as $index => $p)
    <div class="card text-center mb-2">
        <div class="card-header">
            Posted by : {{$p->user->name}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$p->title}}</h5>
            <p class="card-text">{{$p->description}}</p>
        </div>
        <div class="card-footer text-body-secondary">
            {{$p->updated_at->diffForHumans()}}
        </div>
    </div>
    @endforeach
    {{$posts->links('pagination::bootstrap-5')}}
</div>
@endsection