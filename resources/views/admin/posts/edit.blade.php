@extends('layouts.app')

@section('content')
  <div>
    
    <form method="post" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" value='{{old('title', $post->title)}}' name="title">
            <small class="form-text text-muted">The post's title.</small>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">IMG</label>
            <input type="file" class="form-control" name="img">
            <small class="form-text text-muted">The post's img.</small>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name='description' class="form-control  @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="10">{{old('description', $post->description)}}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">

            <div class="mb-3">
                <label>Categoria</label>
                <select name="category_id" class="custom-select">
                    <option value="">-- nessuna categoria --</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ( $post->category_id === $category->id ) selected @endIf>
                        {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            @foreach($tags as $tag)
                
            <div class="form-check form-check-inline">
                <label for="{{ 'tag-'.$tag->id }}"> {{ $tag->name }} </label>
                <input name='tags[]' type="checkbox" id="{{ 'tag-'.$tag->id }}" value=" {{ $tag->id }} " {{ $post->tags->contains($tag) ?'checked':''}}>
            </div>
            @endforeach
            
        </div>
        <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-secondary">Annulla</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection