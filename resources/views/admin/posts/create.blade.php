@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('admin.posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title">
            <small class="form-text text-muted">The post's title.</small>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection