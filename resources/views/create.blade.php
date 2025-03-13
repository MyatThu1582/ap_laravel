@extends('layout')
@section('content')
<div style="width: 45rem; margin: 0px auto !important;">
    <div class="card m-5">
        <div class="card-header text-center p-3">
            <h5 class="card-title">New Post</h5>
        </div>
        <form action="/posts" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="mb-2">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="Enter title">
                    <label for="" class="mt-3 mb-2">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description" id="description" placeholder="Enter description">{{ old('description') }}</textarea>
                </div><br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card-footer p-3">
                <button class="btn btn-primary btn-sm float-end">Save Change</button>
                <a href="/posts" class="btn btn-danger btn-sm float-end me-2">Back</a>
            </div>
        </form>
    </div>    
</div>
@endsection