@extends('layout')
@section('content')
<div style="width: 45rem; margin: 0px auto !important;">
    <div class="card m-5">
        <div class="card-header">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-subtitle" style="font-style:italic;">Category : {{ $post->category->name }}</p>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $post->description }}</p>
            <a href="/posts" class="btn btn-danger btn-sm float-end">Go Back</a>
        </div>
    </div>    
</div>
@endsection