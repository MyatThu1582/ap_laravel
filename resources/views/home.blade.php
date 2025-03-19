@extends('layout')
@section('content')
{{-- <a href="{{ route('home') }}" class="btn btn-primary btn-sm ms-3" style="margin-top:-50px;">Go To Home Path</a> --}}
<p class="ms-3 h4" style="margin-top:-50px; font-weight: bold;">{{ Auth::user()->name }}</p>
<a href="logout" class="btn btn-danger btn-sm ms-3 float-end" style="margin-top:-50px; margin-right: 140px;">Logout</a>
<a href="posts/create" class="btn btn-success btn-sm float-end me-3" style="margin-top:-50px;">+ Add New Post</a>
<div style="width: 45rem; margin: 0px auto !important;">
    @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show mt-5 ms-5" role="alert" style="width: 39rem;">
        <strong>{{ session('status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    
    @endif
    @foreach ($datas as $data)
    <div class="card m-5">
        <div class="card-header text-center">
            <h5 class="card-title">{{ $data->title }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $data->description }}</p>
            <a href="/posts/{{ $data->id }}" class="btn btn-primary btn-sm float-end">View Detail</a>
            <a href="/posts/{{ $data->id }}/edit" class="btn btn-warning btn-sm float-end me-2">Edit Post</a>
        </div>
    </div>    
    @endforeach
</div>
@endsection