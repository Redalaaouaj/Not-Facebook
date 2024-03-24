@extends('layouts.app')
@section('title') INDEX @endsection
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
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ request()->query('title')}}">
                </div>
                <div class="col col2">
                    <input type="submit" value="Search by title" class="btn btn-secondary">
                    <a href="{{route('posts.index')}}" class="btn btn-light">Clear</a>
                </div>
            </div>
        </form>
        <!-- <form action="" class="form align-self-baseline" style="display: inline;">
            <input type="hidden" name="clear">
            <input type="submit" value="Clear" class="btn btn-light">
        </form> -->
    </div>

    <a href="{{route('posts.create')}}" class="btn btn-dark my-3">Create Post</a>

    <table class="table ">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Posted By</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $index => $p)
            <tr>
                <!-- <td>{{$p->id}}</td> -->
                <td>{{$index+1}}</td>
                <td>{{$p->title}}</td>
                <td>{{$p->user->name}}</td>
                <td>{{$p->created_at->format('d/m/Y')}}</td>
                <td>
                    <a href="{{route('posts.show',$p->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$p->id)}}" class="btn btn-warning">Edit</a>

                    <form action="{{route('posts.destroy',$p->id)}}" method="post" style="display: inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection