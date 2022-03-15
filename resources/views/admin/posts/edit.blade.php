@extends('layouts.app')

{{-- @section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex">
            Aggiunta di un nuovo post
          </div>
          <div class="card-body">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
              @csrf
              @method("patch")
              titolo
              <div class="mb-3">
                <label>Titolo</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                  placeholder="Inserisci il titolo" value="{{ old('title', $post->title) }}" required>
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label>Contenuto</label>
                <textarea name="content" rows="10" class="form-control @error('description') is-invalid @enderror"
                  placeholder="Inizia a scrivere qualcosa..." > {{ old('description', $post->description) }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label>Categoria</label>
                <select name="category_id" class="form-select">
                  <option value="">-- nessuna categoria --</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($post->category_id === $category->id) selected @endIf>
                      {{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-secondary">Annulla</a>
                <button type="submit" class="btn btn-success">Salva post</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection  --}}

@section('content')
    <form method="post" action="{{ route('admin.posts.update', $post->id) }}">
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
        <a href="{{ route('admin.posts.show', $post->slug) }}" class="btn btn-secondary">Annulla</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection