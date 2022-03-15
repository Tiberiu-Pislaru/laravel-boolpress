@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('admin.posts.store') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" value='{{old('title')}}' name="title">
            <small class="form-text text-muted">The post's title.</small>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name='description' class="form-control  @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="10">{{old('description')}}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection