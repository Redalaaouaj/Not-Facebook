@extends('layouts.app')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="text-center">

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